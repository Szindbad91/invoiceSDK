<?php

namespace invoiceSDK\Factory;

use invoiceSDK\EndpointHandlers\DataPresenters\DataPresenterInterface;
use invoiceSDK\EndpointHandlers\DataPresenters\InvoiceDataPresenter;
use invoiceSDK\EndpointHandlers\DataPresenters\InvoiceItemDataPresenter;
use invoiceSDK\EndpointHandlers\DataPresenters\PaymentDataPresenter;

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
            case PaymentDataPresenter::class:
                return new PaymentDataPresenter();
            default:
                throw new \Exception('Type ' . $type . ' not supported');
        }
    }
}