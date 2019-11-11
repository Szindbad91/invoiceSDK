<?php

namespace invoiceSDK\EndpointHandlers\DataPresenters;

use invoiceSDK\DataStructures\Invoice;

class PaymentDataPresenter extends AbstractDataPresenter
{
    /**
     * @var Invoice $data
     */
    protected $data;

    public function present(): string
    {
        $dataToPresent = new \stdClass();
        $dataToPresent->invoiceId = $this->data->getInvoiceId();
        $dataToPresent->paymentStatus = $this->data->getPaymentStatus();
        if (!is_null($this->data->getTransactionNumber())) {
            $dataToPresent->transactionNumber = $this->data->getTransactionNumber();
        }
        return json_encode($dataToPresent);
    }
}