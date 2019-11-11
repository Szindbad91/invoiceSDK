<?php

namespace invoiceSDK\EndpointHandlers\DataPresenters;

abstract class AbstractDataPresenter implements DataPresenterInterface
{
    protected $data;

    public function setData($data): void
    {
        $this->data = $data;
    }
}