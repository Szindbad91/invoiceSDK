<?php
namespace invoiceSDK\Classes;

use invoiceSDK\EndpointHandlers\EndpointHandlerInterface;

interface WecoInvoiceApiInterface
{
    public function setEndpointHandler(EndpointHandlerInterface $endpointHandler);
    public function sendRequestToEndpoint($data);
}