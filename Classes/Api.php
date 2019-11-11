<?php
namespace invoiceSDK\Classes;

use invoiceSDK\DataStructures\ApiConfig;
use invoiceSDK\EndpointHandlers\EndpointHandlerInterface;
use invoiceSDK\Factory\ApiAuthenticatorFactory;

class Api implements WecoInvoiceApiInterface
{
    /**
     * @var ApiConfig $apiConfig
     */
    private $apiConfig;
    /**
     * @var Classes\ApiAuthenticatorInterface $apiAuthenticator
     */
    private $apiAuthenticator;

    /**
     * @var EndpointHandlerInterface $endpointHandler
     */
    private $endpointHandler;

    public function __construct(ApiConfig $apiConfig)
    {
        $this->apiConfig = $apiConfig;
        $this->apiAuthenticator = ApiAuthenticatorFactory::create($apiConfig);
    }

    public function setEndpointHandler(EndpointHandlerInterface $endpointHandler)
    {
        $this->endpointHandler = $endpointHandler;
    }

    public function sendRequestToEndpoint(): Response
    {
        $method = $this->endpointHandler->getEndpointMethod();
        $endpoint = $this->endpointHandler->getEndpoint();
        $presentedData = $this->endpointHandler->getPresentedData();

        $token = $this->apiAuthenticator->getToken();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiConfig->getApiHost() . '/' . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $token));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $presentedData);

        return Response::createFromCurlHandler($ch);
    }
}