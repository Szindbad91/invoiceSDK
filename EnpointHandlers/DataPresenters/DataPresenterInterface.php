<?php
namespace invoiceSDK\EndpointHandlers\DataPresenters;

interface DataPresenterInterface
{
    public function setData($data): void;
    public function present(): string;
}