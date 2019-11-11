<?php


namespace invoiceSDK\Factory;


use invoiceSDK\Classes\ApiAuthenticator;
use invoiceSDK\Classes\ApiAuthenticatorInterface;
use invoiceSDK\DataStructures\ApiConfig;

final class ApiAuthenticatorFactory
{
    public static function create(ApiConfig $apiConfig): ApiAuthenticatorInterface
    {
        return new ApiAuthenticator($apiConfig);
    }
}