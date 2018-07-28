<?php

namespace ApiBundle\EventListener;

use ApiBundle\Event\ApiResponseEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class WebApiResponseListener implements ApiListenerInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * WebApiResponseListener constructor.
     * @param RequestStack $requestStack
     */
    public function __construct( RequestStack $requestStack )
    {
        $this->requestStack = $requestStack;
    }

    /**
     * Normalize response to certain format and structure
     * @param ApiResponseEvent $event
     */
    public function onApiResponse( ApiResponseEvent $event )
    {
        if($this->isWebRequest()) {
            $apiResponse = $event->getApiResponse();
            if($apiResponse->getErrors()) {
                $errorsNormalized = [];
                foreach ( $apiResponse->getErrors() as $error ) {
                    $errorsNormalized[$error->getPropertyPath()] = $error->getMessage();
                }
                $apiResponse->setFormat($this->getFormat());
                $apiResponse->setErrors( $errorsNormalized );
            }
        }
    }

    private function isWebRequest()
    {
        // TODO: Analize headers and detect that request come from web and not from iOS, Android etc
        return true;
    }

    public function getFormat()
    {
        // TODO: Analize headers and detect that requested data-format
        return "json";
    }
}
