<?php
/**
 * Example 3.
 * Set payment status to paid for existing invoice
 * Without Transaction number - for payment with transfer
 */

use invoiceSDK\Exceptions\BadRequestException;
use invoiceSDK\Exceptions\InternalServerErrorException;
use invoiceSDK\Exceptions\ServiceUnavailableException;
use invoiceSDK\Factory\ApiConfigFactory;

/**
 * Creating Invoice object
 * For setting the payment status the required parameters are 'invoiceId' and 'paymentStatus'
 * 'paymentStatus' can only have the following values: ('paid')
 */
$invoiceId = 1;
$invoice = new \invoiceSDK\DataStructures\Invoice();
$invoice->setInvoiceId($invoiceId);
$invoice->setPaymentStatus('paid');

/** Creating config object */
$apiConfig = ApiConfigFactory::create();

$apiConfig->setApiHost(getenv('WECOTRAVEL_INVOICE_HOST'));
$apiConfig->setClientId(getenv('WECOTRAVEL_INVOICE_CLIENT_ID'));
$apiConfig->setClientSecret(getenv('WECOTRAVEL_INVOICE_CLIENT_SECRET'));

/** Creating API object */
/** @var \invoiceSDK\Classes\Api $api */
$api = \invoiceSDK\ApiBuilder::build($apiConfig, 'setPaymentStatus', $invoice);
try {
    /** Sending request to API. This function returns with the Response object */
    $response = $api->sendRequestToEndpoint();
    var_dump($response);
} catch (ServiceUnavailableException $exception) {
    // HANDLE SERVICE UNAVAILABLE EXCEPTION, e.g. retry
    var_dump($exception);
} catch (BadRequestException $exception) {
    // HANDLE BAD REQUEST EXCEPTION - USEFUL INFORMATION CAN BE FOUND IN $exception->getErrors()
    var_dump($exception->getErrors());
} catch (InternalServerErrorException $exception) {
    var_dump($exception);
}

