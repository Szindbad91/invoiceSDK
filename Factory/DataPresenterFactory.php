<?php


namespace invoiceSDK\Factory;


use invoiceSDK\EndpointHandlers\DataPresenters\DataPresenterInterface;
use invoiceSDK\EndpointHandlers\DataPresenters\InvoiceDataPresenter;
use invoiceSDK\EndpointHandlers\DataPresenters\InvoiceItemDataPresenter;

final class DataPresenterFactory
{
    public static function create($type): DataPresenterInterface
    {
        switch ($type)
        {
            case InvoiceDataPresenter::class:
                return new InvoiceDataPresenter();
            case InvoiceItemDataPresenter::class:
                return new InvoiceItemDataPresenter();
            default:
                throw new \Exception('Type ' . $type . ' not supported');
        }
    }
}