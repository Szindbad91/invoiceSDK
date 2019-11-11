<?php


namespace invoiceSDK\Classes;


use invoiceSDK\DataStructures\ApiConfig;

class ApiAuthenticator implements ApiAuthenticatorInterface
{
    private $apiConfig;
    private $token;
    private $tokenValidUntil;

    public function __construct(ApiConfig $apiConfig)
    {
        $this->apiConfig = $apiConfig;
    }

    protected function authenticate()
    {

    }

    public function getToken(): string
    {
        if (is_null($this->token)) {
            $this->authenticate();
        }
        return $this->token;
    }
}