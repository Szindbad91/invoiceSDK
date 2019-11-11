<?php


namespace invoiceSDK\Classes;

use invoiceSDK\DataStructures\ApiConfig;

interface ApiAuthenticatorInterface
{
    public function __construct(ApiConfig $apiConfig);
    public function getToken(): string;
}