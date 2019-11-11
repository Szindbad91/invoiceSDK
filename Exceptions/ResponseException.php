<?php

namespace invoiceSDK\Exceptions;

abstract class ResponseException extends \Exception
{
    private $httpStatusCode;

    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    public function getHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode;
    }
}