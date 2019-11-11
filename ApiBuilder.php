<?php
namespace invoiceSDK;

use invoiceSDK\DataStructures\ApiConfig;
use invoiceSDK\EndpointHandlers\PostInvoiceHandler;
use invoiceSDK\EndpointHandlers\PostInvoiceItemHandler;
use invoiceSDK\EndpointHandlers\PutPaymentStatusHandler;
use invoiceSDK\Factory\ApiClientFactory;
use invoiceSDK\Factory\EndpointHandlerFactory;

class ApiBuilder
{
    private static $actionToClassMap = [
        'createInvoice' => PostInvoiceHandler::class,
        'insertInvoiceItem' => PostInvoiceItemHandler::class,
        'setPaymentStatus' => PutPaymentStatusHandler::class,
    ];

    public static function build(ApiConfig $apiConfig, string $action, $data = null)
    {
        $api = ApiClientFactory::create($apiConfig);
        $endpointHandler = EndpointHandlerFactory::create(self::$actionToClassMap[$action]);
        $endpointHandler->setData($data);
        $api->setEndpointHandler($endpointHandler);
    }
}