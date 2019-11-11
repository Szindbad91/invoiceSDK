<?php


namespace invoiceSDK\EndpointHandlers\HttpMethodTraits;


trait PutMethodTrait
{
    public function getEndpointMethod(): string
    {
        return 'PUT';
    }
}