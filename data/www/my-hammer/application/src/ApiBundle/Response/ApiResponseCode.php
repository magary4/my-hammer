<?php

namespace ApiBundle\Response;

class ApiResponseCode
{
    const ERROR = 1000;
    const NOT_FOUND = 1001;
    const SUCCESS = 1002;
    const CLAIM_CREATED = 1003;
    const CLAIM_UPDATED = 1004;
    const CLAIM_INVALID = 1005;
    const CLAIM_NOT_EXISTS = 1006;
    const WRONG_INPUT = 1007;

    // TODO: consider more possible codes
}