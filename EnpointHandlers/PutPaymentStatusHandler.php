<?php


namespace invoiceSDK\EndpointHandlers;


use invoiceSDK\EndpointHandlers\HttpMethodTraits\PutMethodTrait;

class PutPaymentStatusHandler extends AbstractEndpointHandler
{
    use PutMethodTrait;

    private const ENDPOINT = '';

    public function getPresentedData(): string
    {
        // TODO: Implement performApiCall() method.
    }

    public function getEndpoint(): string
    {
        // TODO: Implement getEndpoint() method.
    }
}