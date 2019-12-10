<?php


namespace invoiceSDK\EndpointHandlers\HttpMethodTraits;


trait DeleteMethodTrait
{
    public function getEndpointMethod(): string
    {
        return 'DELETE';
    }
}
