<?php

namespace invoiceSDK\Factory;

use invoiceSDK\Classes\Api;
use invoiceSDK\DataStructures\ApiConfig;

final class ApiClientFactory
{
    public static function create(ApiConfig $apiConfig)
    {
        return new Api($apiConfig);
    }
}