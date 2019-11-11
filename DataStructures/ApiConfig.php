<?php


namespace invoiceSDK\DataStructures;


class ApiConfig
{
    /**
     * @var string $apiHost
     */
    private $apiHost;
    /**
     * @var string $clientId
     */
    private $clientId;

    /**
     * @var string $clientSecret
     */
    private $clientSecret;

    /**
     * @return string
     */
    public function getApiHost(): string
    {
        return $this->apiHost;
    }

    /**
     * @param string $apiHost
     */
    public function setApiHost(string $apiHost): self
    {
        $this->apiHost = $apiHost;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret(string $clientSecret): self
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }


}