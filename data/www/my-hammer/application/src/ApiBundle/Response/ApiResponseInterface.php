<?php

namespace ApiBundle\Response;

use Symfony\Component\HttpFoundation\Response;

interface ApiResponseInterface
{
    public function getFormat();

    public function getResponse(): Response;
}