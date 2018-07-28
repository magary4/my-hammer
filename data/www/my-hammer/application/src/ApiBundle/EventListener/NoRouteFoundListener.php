<?php

namespace ApiBundle\EventListener;

use ApiBundle\Response\ApiResponse;
use ApiBundle\Response\ApiResponseCode;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoRouteFoundListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof NotFoundHttpException) {

            $status = 404;
            $response = new ApiResponse(
                ApiResponseCode::NOT_FOUND,
                $exception->getMessage()
            );
        } else {

            $status = 500;
            $response = new ApiResponse(
                ApiResponseCode::ERROR,
                $exception->getMessage()
            );
        }

        return $event->setResponse(
            new JsonResponse($response, $status)
        );
    }
}