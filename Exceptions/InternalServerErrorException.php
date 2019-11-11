<?php


namespace invoiceSDK\Exceptions;


class InternalServerErrorException extends ResponseException
{
    private $errors;

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
}