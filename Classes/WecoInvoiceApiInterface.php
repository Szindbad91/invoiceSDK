<?php
namespace invoiceSDK\Classes;

use invoiceSDK\EndpointHandlers\EndpointHandlerInterface;

interface WecoInvoiceApiInterface
{
    /**
     * Sets the endpointhandler class
     *
     * @param EndpointHandlerInterface $endpointHandler
     * @return mixed
     */
    public function setEndpointHandler(EndpointHandlerInterface $endpointHandler);

    /**
     * Sends the request through the endpointhandler to the endpoint and returns the response.
     *
     * @return Response
     */
    public function sendRequestToEndpoint(): Response;
}