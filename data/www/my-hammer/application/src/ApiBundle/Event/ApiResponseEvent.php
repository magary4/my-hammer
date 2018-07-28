<?php

namespace ApiBundle\Event;

use ApiBundle\Response\ApiResponse;
use ApiBundle\Response\ApiResponseInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponseEvent extends Event
{

    private $apiResponse;


    public function __construct( ApiResponseInterface $apiResponse )
    {
        $this->apiResponse = $apiResponse;
    }

    public function getResponse()
    {
        return $this->apiResponse->getResponse();
    }

    /**
     * @return ApiResponse
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }

    /**
     * @param ApiResponse $apiResponse
     */
    public function setApiResponse( $apiResponse )
    {
        $this->apiResponse = $apiResponse;
    }

}