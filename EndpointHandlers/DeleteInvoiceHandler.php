<?php


namespace invoiceSDK\EndpointHandlers;

use invoiceSDK\EndpointHandlers\DataPresenters\UpdateStatusDataPresenter;
use invoiceSDK\EndpointHandlers\HttpMethodTraits\DeleteMethodTrait;
use invoiceSDK\Factory\DataPresenterFactory;

class DeleteInvoiceHandler extends AbstractEndpointHandler
{
    use DeleteMethodTrait;

    private const ENDPOINT = 'api/invoice/remove';

    public function __construct()
    {
        $this->dataPresenter = DataPresenterFactory::create(UpdateStatusDataPresenter::class);
    }

    public function getPresentedData(): string
    {
        $this->data->setPaymentStatus('deleted');
        $this->dataPresenter->setData($this->data);
        return $this->dataPresenter->present();
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
