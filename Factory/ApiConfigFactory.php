<?php
namespace invoiceSDK\Factory;

final class ApiConfigFactory
{
    public static function create()
    {
        return new \invoiceSDK\DataStructures\ApiConfig();
    }
}