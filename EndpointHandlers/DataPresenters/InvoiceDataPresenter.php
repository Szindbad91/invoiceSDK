<?php

namespace invoiceSDK\EndpointHandlers\DataPresenters;

use invoiceSDK\DataStructures\Invoice;

class InvoiceDataPresenter extends AbstractDataPresenter
{
    /** @var Invoice */
    protected $data;

    public function present(): string
    {
        if (!($this->data instanceof Invoice)) {
            throw new \TypeError('Data must be a type of ' . Invoice::class);
        }

        $objectToPresent = new \stdClass();
        $objectToPresent->customerName = $this->data->getCustomerName();
        $objectToPresent->customerCity = $this->data->getCustomerCity();
        $objectToPresent->customerAddress = $this->data->getCustomerAddress();
        $objectToPresent->customerZipCode = $this->data->getCustomerZipCode();
        $objectToPresent->customerCountryCode = $this->data->getCustomerCountryCode();
        $objectToPresent->date = $this->data->getDate()->format('Y-m-d');
        $objectToPresent->eventName = $this->data->getEventName();
        $objectToPresent->positionStartDate = $this->data->getPositionStartDate()->format('Y-m-d');
        $objectToPresent->positionEndDate = $this->data->getPositionEndDate()->format('Y-m-d');
        $objectToPresent->positionNumber = $this->data->getPositionNumber();
        $objectToPresent->customerReference = $this->data->getCustomerReference();
        if (!is_null($this->data->getCompany()) && $this->data->getCompany()) {
            $objectToPresent->company = $this->data->getCompany();
        }
        if (!is_null($this->data->getVatNumber()) && $this->data->getVatNumber()) {
            $objectToPresent->vatNumber = $this->data->getVatNumber();
        }
        $objectToPresent->emailAddress = $this->data->getEmailAddress();
        $objectToPresent->externalInvoiceNumber = $this->data->getExternalInvoiceNumber();
        $objectToPresent->callbackUrl = $this->data->getCallbackUrl();
        if (!is_null($this->data->getTransactionNumber()) && $this->data->getTransactionNumber()) {
            $objectToPresent->transactionNumber = $this->data->getTransactionNumber();
            $objectToPresent->paymentStatus = 'paid';
        }

        if (!is_null($this->data->getInvoiceItems())) {
            $objectToPresent->invoiceItems = [];
            foreach ($this->data->getInvoiceItems() as $invoiceItem) {
                $invoiceItemPresenter = new InvoiceItemDataPresenter();
                $invoiceItemPresenter->setData($invoiceItem);
                $objectToPresent->invoiceItems[] = $invoiceItemPresenter->getDataToPresent();
            }
        }

        return json_encode($objectToPresent);
    }
}
