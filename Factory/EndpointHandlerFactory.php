<?php


namespace invoiceSDK\Factory;


use invoiceSDK\EndpointHandlers\EndpointHandlerInterface;
use invoiceSDK\EndpointHandlers\PostInvoiceHandler;
use invoiceSDK\EndpointHandlers\PostInvoiceItemHandler;
use invoiceSDK\EndpointHandlers\PutPaymentStatusHandler;
use mysql_xdevapi\Exception;

final class EndpointHandlerFactory
{
    public static function create(string $type): EndpointHandlerInterface
    {
        switch ($type)
        {
            case PostInvoiceHandler::class:
                return new PostInvoiceHandler();
            case PostInvoiceItemHandler::class:
                return new PostInvoiceItemHandler();
            case PutPaymentStatusHandler::class:
                return new PutPaymentStatusHandler();
            default:
                throw new Exception('Handler type is not supported');
        }
    }
}