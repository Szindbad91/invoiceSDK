<?php


namespace invoiceSDK\Classes;

use invoiceSDK\DataStructures\ApiConfig;
use invoiceSDK\Exceptions\AuthenticationException;
use invoiceSDK\Exceptions\InternalServerErrorException;
use invoiceSDK\Exceptions\ServiceUnavailableException;

class ApiAuthenticator implements ApiAuthenticatorInterface
{
    private $apiConfig;
    private $token;

    private const AUTH_ENDPOINT = 'oauth/v2/token';

    public function __construct(ApiConfig $apiConfig)
    {
        $this->apiConfig = $apiConfig;
    }

    protected function authenticate()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiConfig->getApiHost() . '/' . self::AUTH_ENDPOINT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper("POST"));
        $data = new \stdClass();
        $data->grant_type = "client_credentials";
        $data->client_id = $this->apiConfig->getClientId();
        $data->client_secret = $this->apiConfig->getClientSecret();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        if (!$response) {
            throw new ServiceUnavailableException('Service not available');
        }
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($statusCode == 500) {
            throw new InternalServerErrorException('Internal Server Error during Authentication');
        }
        if ($statusCode == 400) {
            $exception = new AuthenticationException('Failed to authenticate');
            $responseObject = json_decode($response);
            $exception->setErrorInfo($responseObject);
            throw $exception;
        }
        $responseObject = json_decode($response);
        $this->token = $responseObject->access_token;
    }

    public function getToken(): string
    {
        if (is_null($this->token)) {
            $this->authenticate();
        }
        return $this->token;
    }
}