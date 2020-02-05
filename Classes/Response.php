<?php

namespace invoiceSDK\Classes;

use invoiceSDK\Exceptions\BadRequestException;
use invoiceSDK\Exceptions\InternalServerErrorException;
use invoiceSDK\Exceptions\ServiceUnavailableException;

class Response
{
    /**
     * @var int $httpStatusCode
     */
    private $httpStatusCode;

    /**
     * @var string $body
     */
    private $body;

    public static function createFromCurlHandler ($curl): Response
    {
        $curlResponse = curl_exec($curl);
        if ($curlResponse === false) {
            throw new ServiceUnavailableException("Service is not available");
        }
        $response = new Response();
        $statusCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($statusCode == 400) {
            $exception = new BadRequestException('Bad request');
            $exception->setErrors(json_decode($curlResponse, true)['errors']);
            throw $exception;
        } else if ($statusCode == 500) {
            $exception = new InternalServerErrorException('Internal Server Error');
            if ($curlResponse) {
                $response = json_decode($curlResponse, true);

                if ($response && isset($response['errors'])) {
                    $exception->setErrors($response['errors']);
                }
            }
            throw $exception;
        }
        $response->setHttpStatusCode($statusCode);
        $response->setBody($curlResponse);
        return $response;
    }

    private function setHttpStatusCode(int $httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    private function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
