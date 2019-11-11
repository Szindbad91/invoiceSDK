<?php

namespace invoiceSDK\Factory;

use invoiceSDK\DataStructures\ApiConfig;

final class ApiConfigFactory
{
    public static function create()
    {
        return new ApiConfig();
    }
}