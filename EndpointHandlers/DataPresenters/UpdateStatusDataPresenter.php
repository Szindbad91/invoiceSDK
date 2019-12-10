<?php


namespace invoiceSDK\EndpointHandlers\DataPresenters;


class UpdateStatusDataPresenter extends AbstractDataPresenter
{

    public function present(): string
    {
        $dataToPresent = new \stdClass();
        $dataToPresent->invoiceId = $this->data->getInvoiceId();
        $dataToPresent->paymentStatus = $this->data->getPaymentStatus();
        return json_encode($dataToPresent);
    }
}
