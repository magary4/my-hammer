<?php
declare( strict_types=1 );

namespace ApiBundle\Service;

use ApiBundle\Entity\Claim;
use ApiBundle\Response\ApiResponseCode;
use ApiBundle\Response\ApiResponse;
use ApiBundle\Form\ClaimType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiManager
{
    // TODO: make class independent from Entity-type. Improve to process input to different Entities

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * ApiManager constructor.
     * @param EntityManager $entityManager
     * @param FormFactoryInterface $formFactory
     * @param ValidatorInterface $validator
     */
    public function __construct(
        EntityManager $entityManager,
        FormFactoryInterface $formFactory,
        ValidatorInterface $validator )
    {
        $this->entityManager = $entityManager;
        $this->formFactory   = $formFactory;
        $this->validator     = $validator;
    }

    /**
     * Handle input array to save it in DB
     * @param array $data
     * @return ApiResponse
     */
    public function proccessInput( $data ): ApiResponse
    {
        $apiResponse = new ApiResponse();

        if ( $data ) {

            $claim = new Claim();
            $form  = $this->formFactory->create( ClaimType::class, $claim );
            $form->submit( $data );

            $violations = $this->validator->validate( $claim );

            if ( count( $violations ) ) {

                $apiResponse->setCode( ApiResponseCode::WRONG_INPUT );
                $apiResponse->setMessage( "Input is wrong" );
                $apiResponse->setStatus( 409 );
                $apiResponse->setErrors( $violations );
            } else {

                try {

                    $this->entityManager->persist( $claim );
                    $this->entityManager->flush();

                    $apiResponse->setCode( ApiResponseCode::CLAIM_CREATED );
                    $apiResponse->setStatus( 201 );
                    $apiResponse->setData( [ "id" => $claim->getId() ] );
                    $apiResponse->setMessage( "Claim added successfully" );

                } catch ( \Exception $e ) {

                    $apiResponse->setCode( ApiResponseCode::CLAIM_INVALID );
                    $apiResponse->setStatus( 409 );
                    $apiResponse->setMessage( $e->getMessage() );
                }
            }

        } else {
            $apiResponse->setCode( ApiResponseCode::CLAIM_INVALID );
            $apiResponse->setStatus( 409 );
            $apiResponse->setMessage( "Input is wrong" );
        }

        return $apiResponse;
    }
}