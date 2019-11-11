<?php


namespace invoiceSDK\EndpointHandlers;


use invoiceSDK\DataStructures\InvoiceItem;
use invoiceSDK\EndpointHandlers\HttpMethodTraits\PostMethodTrait;
use invoiceSDK\Factory\DataPresenterFactory;

class PostInvoiceItemHandler extends AbstractEndpointHandler
{
    use PostMethodTrait;

    private $dataPresenter;

    private const ENDPOINT = '/api/invoice/item';

    public function __construct()
    {
        $this->dataPresenter = DataPresenterFactory::create(InvoiceItem::class);
        $this->setData($this->data);
    }

    public function getPresentedData(): string
    {
        return $this->dataPresenter->present();
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}