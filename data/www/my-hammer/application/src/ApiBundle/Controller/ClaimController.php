<?php

namespace ApiBundle\Controller;

use ApiBundle\Event\ApiResponseEvent;
use ApiBundle\Service\ApiManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClaimController extends Controller
{
    /**
     * @Route("/create", methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $apiResponse = $this->get(ApiManager::class)->proccessInput($data);

        $apiResponse = new ApiResponseEvent( $apiResponse );
        $this->container->get("event_dispatcher")->dispatch( 'api.response', $apiResponse );

        return $apiResponse->getResponse();
    }

    /**
     * @Route("/read", methods={"GET"})
     */
    public function readAction()
    {
        // TODO: read
        throw new NotFoundHttpException("Not implemented yet");
    }

    /**
     * @Route("/update/{id}", methods={"PUT","PATCH"}, requirements={"id"="\d+"})
     */
    public function updateAction()
    {
        // TODO: update
        throw new NotFoundHttpException("Not implemented yet");
    }

    /**
     * @Route("/delete/{id}", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function deleteAction()
    {
        // TODO: delete
        throw new NotFoundHttpException("Not implemented yet");
    }
}