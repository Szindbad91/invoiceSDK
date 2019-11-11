<?php


namespace invoiceSDK\EndpointHandlers;


interface EndpointHandlerInterface
{
    public function getEndpointMethod(): string;
    public function setData($data): void;
    public function getPresentedData(): string;
    public function getEndpoint(): string;
}