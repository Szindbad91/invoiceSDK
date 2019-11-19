<?php

namespace invoiceSDK\EndpointHandlers;

use invoiceSDK\EndpointHandlers\DataPresenters\InvoiceDataPresenter;
use invoiceSDK\EndpointHandlers\HttpMethodTraits\PostMethodTrait;
use invoiceSDK\Factory\DataPresenterFactory;

class PostInvoiceHandler extends AbstractEndpointHandler
{
    use PostMethodTrait;

    private const ENDPOINT = 'api/invoice';

    public function __construct()
    {
        $this->dataPresenter = DataPresenterFactory::create(InvoiceDataPresenter::class);
    }

    public function getPresentedData(): string
    {
        $this->dataPresenter->setData($this->data);
        return $this->dataPresenter->present();
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
