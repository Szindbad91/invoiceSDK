<?php

namespace invoiceSDK\Exceptions;

class BadRequestException extends ResponseException
{
    private $errors;

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}