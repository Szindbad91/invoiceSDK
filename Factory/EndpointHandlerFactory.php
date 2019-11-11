<?php

namespace invoiceSDK\Factory;

use invoiceSDK\EndpointHandlers\EndpointHandlerInterface;
use invoiceSDK\EndpointHandlers\PostInvoiceHandler;
use invoiceSDK\EndpointHandlers\PutPaymentStatusHandler;

final class EndpointHandlerFactory
{
    public static function create(string $type): EndpointHandlerInterface
    {
        switch ($type)
        {
            case PostInvoiceHandler::class:
                return new PostInvoiceHandler();
            case PutPaymentStatusHandler::class:
                return new PutPaymentStatusHandler();
            default:
                throw new \Exception('Handler type is not supported');
        }
    }
}