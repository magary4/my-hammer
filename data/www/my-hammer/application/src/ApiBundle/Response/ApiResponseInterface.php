<?php

namespace ApiBundle\Response;

interface ApiResponseInterface
{
    public function getFormat();

    public function getResponse();
}