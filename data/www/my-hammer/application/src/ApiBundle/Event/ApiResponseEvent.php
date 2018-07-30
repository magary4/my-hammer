<?php
declare(strict_types=1);

namespace ApiBundle\Event;

use ApiBundle\Response\ApiResponse;
use ApiBundle\Response\ApiResponseInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponseEvent extends Event
{

    private $apiResponse;


    public function __construct( ApiResponseInterface $apiResponse )
    {
        $this->apiResponse = $apiResponse;
    }

    public function getResponse(): Response
    {
        return $this->apiResponse->getResponse();
    }

    /**
     * @return ApiResponse
     */
    public function getApiResponse(): ApiResponseInterface
    {
        return $this->apiResponse;
    }

    /**
     * @param ApiResponse $apiResponse
     */
    public function setApiResponse( ApiResponseInterface $apiResponse ): void
    {
        $this->apiResponse = $apiResponse;
    }

}