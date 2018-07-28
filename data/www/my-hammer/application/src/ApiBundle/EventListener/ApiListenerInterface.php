<?php

namespace ApiBundle\EventListener;

use ApiBundle\Event\ApiResponseEvent;

interface ApiListenerInterface
{
    public function onApiResponse( ApiResponseEvent $event );
}