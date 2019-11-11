<?php


namespace invoiceSDK\Exceptions;


class AuthenticationException extends \Exception
{
    private $errorInfo;

    /**
     * @return mixed
     */
    public function getErrorInfo()
    {
        return $this->errorInfo;
    }

    /**
     * @param mixed $errors
     */
    public function setErrorInfo($errorInfo): void
    {
        $this->errors = $errorInfo;
    }
}