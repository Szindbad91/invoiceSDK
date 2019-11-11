<?php

namespace invoiceSDK\EndpointHandlers;

use invoiceSDK\EndpointHandlers\DataPresenters\PaymentDataPresenter;
use invoiceSDK\EndpointHandlers\HttpMethodTraits\PutMethodTrait;
use invoiceSDK\Factory\DataPresenterFactory;

class PutPaymentStatusHandler extends AbstractEndpointHandler
{
    use PutMethodTrait;

    private const ENDPOINT = 'api/payment/set';

    public function getPresentedData(): string
    {
        $dataPresenter = DataPresenterFactory::create(PaymentDataPresenter::class);
        $dataPresenter->setData($this->data);
        return $dataPresenter->present();
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}