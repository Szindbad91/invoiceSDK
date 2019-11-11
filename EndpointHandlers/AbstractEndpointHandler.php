<?php

namespace invoiceSDK\EndpointHandlers;

use invoiceSDK\EndpointHandlers\DataPresenters\DataPresenterInterface;

abstract class AbstractEndpointHandler implements EndpointHandlerInterface
{
    protected $data;
    /**
     * @var DataPresenterInterface $dataPresenter
     */
    protected $dataPresenter;

    public function setData($data): void
    {
        $this->data = $data;
    }

    protected function setDataPresenter(DataPresenterInterface $dataPresenter)
    {
        $this->dataPresenter = $dataPresenter;
    }

    public function getPresentedData(): string
    {
        $this->dataPresenter->setData($this->data);
        return $this->dataPresenter->present();
    }
}