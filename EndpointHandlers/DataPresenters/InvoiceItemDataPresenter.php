<?php

namespace invoiceSDK\EndpointHandlers\DataPresenters;

use invoiceSDK\DataStructures\InvoiceItem;

class InvoiceItemDataPresenter extends AbstractDataPresenter
{
    /** @var InvoiceItem */
    protected $data;

    public function present(): string
    {
        if (!($this->data instanceof InvoiceItem)) {
            throw new \TypeError('Data must be a type of ' . InvoiceItem::class);
        }


        $objectToPresent = $this->getDataToPresent();
        return json_encode($objectToPresent);
    }

    public function getDataToPresent()
    {
        $objectToPresent = new \stdClass();
        $objectToPresent->orderText = $this->data->getOrderText();
        $objectToPresent->quantity = (int) $this->data->getQuantity();
        $objectToPresent->unit = $this->data->getUnit();
        $objectToPresent->currencyCode = $this->data->getCurrencyCode();
        $objectToPresent->grossPrice = $this->data->getGrossPrice();
        $objectToPresent->rowSum = $this->data->getRowSum();
        $objectToPresent->itemNumber = $this->data->getItemNumber();
        return $objectToPresent;
    }
}