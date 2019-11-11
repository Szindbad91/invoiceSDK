<?php
/**
 * Example 1.
 * Create invoice for payment with bankcard
 */

use invoiceSDK\DataStructures\InvoiceItem;
use invoiceSDK\Exceptions\BadRequestException;
use invoiceSDK\Exceptions\InternalServerErrorException;
use invoiceSDK\Exceptions\ServiceUnavailableException;
use invoiceSDK\Factory\ApiConfigFactory;

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
$invoice->setPaymentStatus('paid');
$invoice->setTransactionNumber('TRANSACTIONNUMBER0123456789');
$invoice->setCallbackUrl('https://test-callback-url.hu/payment');

$invoiceItem = new InvoiceItem();
$invoiceItem->setOrderText('Item order text');
$invoiceItem->setQuantity(1);
$invoiceItem->setUnit('fo');
$invoiceItem->setCurrencyCode('HUF');
$invoiceItem->setGrossPrice(1000);
$invoiceItem->setItemNumber('1');
$invoiceItem->setRowSum(1000);

$invoice->addInvoiceItem($invoiceItem);

$apiConfig = ApiConfigFactory::create();

$apiConfig->setApiHost(getenv('WECOTRAVEL_INVOICE_HOST'));
$apiConfig->setClientId(getenv('WECOTRAVEL_INVOICE_CLIENT_ID'));
$apiConfig->setClientSecret(getenv('WECOTRAVEL_INVOICE_CLIENT_SECRET'));

/** @var \invoiceSDK\Classes\Api $api */
$api = \invoiceSDK\ApiBuilder::build($apiConfig, 'createInvoice', $invoice);
try {
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


