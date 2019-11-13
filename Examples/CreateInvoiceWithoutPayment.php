<?php
/**
 * Example 1.
 * Create invoice for payment with transfer
 */

use invoiceSDK\DataStructures\InvoiceItem;
use invoiceSDK\Exceptions\BadRequestException;
use invoiceSDK\Exceptions\ServiceUnavailableException;
use invoiceSDK\Exceptions\InternalServerErrorException;
use invoiceSDK\Factory\ApiConfigFactory;

/**
 * Create Invoice object
 * All parameters are Required
 */
$invoice = new \invoiceSDK\DataStructures\Invoice();
$invoice->setCustomerName('Test Customer');
$invoice->setCustomerCity('City');
$invoice->setCustomerAddress('Address 1.');
$invoice->setCustomerZipCode('1234');
$invoice->setCustomerCountryCode('HUN');
$invoice->setDate(new \DateTime());
$invoice->setEventName('TEST2019');
$invoice->setPositionStartDate(new \DateTime());
$invoice->setPositionEndDate(new \DateTime());
$invoice->setPositionNumber("A0000000001");
$invoice->setCustomerReference('REF1234');
$invoice->setCompany('Test Company Co.');
$invoice->setEmailAddress('test@email.hu');
$invoice->setExternalInvoiceNumber('123\TEST2019');
$invoice->setCallbackUrl('https://test-callback-url.hu/payment');

/**
 * Create InvoiceItem object
 * Multiple item can be added to Invoice
 */
$invoiceItem = new InvoiceItem();
$invoiceItem->setOrderText('Item order text');
$invoiceItem->setQuantity(1);
$invoiceItem->setUnit('fo');
$invoiceItem->setCurrencyCode('HUF');
$invoiceItem->setGrossPrice(1000);
$invoiceItem->setItemNumber('1');
$invoiceItem->setRowSum(1000);

/** Adding invoice item to invoice */
$invoice->addInvoiceItem($invoiceItem);

/** Creating config object */
$apiConfig = ApiConfigFactory::create();

/** Setting up config from environment variables */
$apiConfig->setApiHost(getenv('WECOTRAVEL_INVOICE_HOST'));
$apiConfig->setClientId(getenv('WECOTRAVEL_INVOICE_CLIENT_ID'));
$apiConfig->setClientSecret(getenv('WECOTRAVEL_INVOICE_CLIENT_SECRET'));

/** Creating API object */
/** @var \invoiceSDK\Classes\Api $api */
$api = \invoiceSDK\ApiBuilder::build($apiConfig, 'createInvoice', $invoice);
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


