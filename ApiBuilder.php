<?php
namespace invoiceSDK;

use invoiceSDK\Classes\WecoInvoiceApiInterface;
use invoiceSDK\DataStructures\ApiConfig;
use invoiceSDK\EndpointHandlers\PostInvoiceHandler;
use invoiceSDK\EndpointHandlers\PutPaymentStatusHandler;
use invoiceSDK\Exceptions\BadRequestException;
use invoiceSDK\Exceptions\ServiceUnavailableException;
use invoiceSDK\Factory\ApiClientFactory;
use invoiceSDK\Factory\EndpointHandlerFactory;

/**
 * Creates an instance of WecoInvoiceApiInterface
 * Class ApiBuilder
 * @package invoiceSDK
 */
class ApiBuilder
{
    private static $actionToClassMap = [
        'createInvoice' => PostInvoiceHandler::class,
        'setPaymentStatus' => PutPaymentStatusHandler::class,
    ];

    /**
     *
     * @param ApiConfig $apiConfig
     * @param string $action
     * @param null $data
     *
     * @return WecoInvoiceApiInterface
     *
     * @throws \Exception | BadRequestException | ServiceUnavailableException
     */
    public static function build(ApiConfig $apiConfig, string $action, $data = null): WecoInvoiceApiInterface
    {
        $api = ApiClientFactory::create($apiConfig);
        $endpointHandler = EndpointHandlerFactory::create(self::$actionToClassMap[$action]);
        $endpointHandler->setData($data);
        $api->setEndpointHandler($endpointHandler);
        return $api;
    }
}
