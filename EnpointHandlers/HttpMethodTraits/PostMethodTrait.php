<?php


namespace invoiceSDK\EndpointHandlers\HttpMethodTraits;


trait PostMethodTrait
{
    public function getEndpointMethod(): string
    {
        return 'POST';
    }
}