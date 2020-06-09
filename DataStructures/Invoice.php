<?php
namespace invoiceSDK\DataStructures;

class Invoice
{
    /**
     * @var int $invoideId
     */
    private $invoiceId;
    /**
     * @var string $customerName
     */
    private $customerName;

    /**
     * @var string $customerCity
     */
    private $customerCity;

    /**
     * @var string $customerAddress
     */
    private $customerAddress;

    /**
     * @var string $customerZipCode
     */
    private $customerZipCode;

    /**
     * @var string $customerCountryCode
     */
    private $customerCountryCode;

    /**
     * @var \DateTimeInterface $date
     */
    private $date;

    /**
     * @var string $eventName
     */
    private $eventName;

    /**
     * @var \DateTimeInterface $positionStartDate
     */
    private $positionStartDate;

    /**
     * @var \DateTimeInterface $positionEndDate
     */
    private $positionEndDate;

    /**
     * @var string $positionNumber
     */
    private $positionNumber;

    /**
     * @var string $customerReference
     */
    private $customerReference;

    /**
     * @var string $company
     */
    private $company;

    /**
     * @var string $emailAddress
     */
    private $emailAddress;

    /**
     * @var string $paymentStatus
     */
    private $paymentStatus;

    /**
     * @var string $transactionNumber
     */
    private $transactionNumber;

    /**
     * @var string $externalInvoiceNumber
     */
    private $externalInvoiceNumber;

    /**
     * @var string $callbackUrl
     */
    private $callbackUrl;

    /**
     * @var InvoiceItem[] $invoiceItems
     */
    private $invoiceItems;

    /**
     * @var string $vatNumber
     */
    private $vatNumber;

    public function __construct()
    {
        $this->invoiceItems = [];
    }

    /**
     * @param int $invoiceId
     */
    public function setInvoiceId(int $invoiceId): self
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }
    /**
     * @param string $customerName
     */
    public function setCustomerName(string $customerName): self
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * @param string $customerCity
     */
    public function setCustomerCity(string $customerCity): self
    {
        $this->customerCity = $customerCity;

        return $this;
    }

    /**
     * @param string $customerAddress
     */
    public function setCustomerAddress(string $customerAddress): self
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * @param string $customerZipCode
     */
    public function setCustomerZipCode(string $customerZipCode): self
    {
        $this->customerZipCode = $customerZipCode;

        return $this;
    }

    /**
     * @param string $customerCountryCode
     */
    public function setCustomerCountryCode(string $customerCountryCode): self
    {
        $this->customerCountryCode = $customerCountryCode;

        return $this;
    }

    /**
     * @param \DateTimeInterface $date
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $eventName
     */
    public function setEventName(string $eventName): self
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * @param \DateTimeInterface $positionStartDate
     */
    public function setPositionStartDate(\DateTimeInterface $positionStartDate): self
    {
        $this->positionStartDate = $positionStartDate;

        return $this;
    }

    /**
     * @param \DateTimeInterface $positionEndDate
     */
    public function setPositionEndDate(\DateTimeInterface $positionEndDate): self
    {
        $this->positionEndDate = $positionEndDate;

        return $this;
    }

    /**
     * @param string $positionNumber
     */
    public function setPositionNumber(string $positionNumber): self
    {
        $this->positionNumber = $positionNumber;

        return $this;
    }

    /**
     * @param string $customerReference
     */
    public function setCustomerReference(string $customerReference):self
    {
        $this->customerReference = $customerReference;

        return $this;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @param string $paymentStatus
     */
    public function setPaymentStatus(string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * @param string $transactionNumber
     */
    public function setTransactionNumber(string $transactionNumber): self
    {
        $this->transactionNumber = $transactionNumber;

        return $this;
    }

    /**
     * @param string $externalInvoiceNumber
     */
    public function setExternalInvoiceNumber(string $externalInvoiceNumber): self
    {
        $this->externalInvoiceNumber = $externalInvoiceNumber;

        return $this;
    }

    /**
     * @param InvoiceItem[] $invoiceItems
     */
    public function addInvoiceItem(InvoiceItem $invoiceItems): self
    {
        $this->invoiceItems[] = $invoiceItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }

    /**
     * @return string
     */
    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    /**
     * @return string
     */
    public function getCustomerCity(): ?string
    {
        return $this->customerCity;
    }

    /**
     * @return string
     */
    public function getCustomerAddress(): ?string
    {
        return $this->customerAddress;
    }

    /**
     * @return string
     */
    public function getCustomerZipCode(): ?string
    {
        return $this->customerZipCode;
    }

    /**
     * @return string
     */
    public function getCustomerCountryCode(): ?string
    {
        return $this->customerCountryCode;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPositionStartDate(): ?\DateTimeInterface
    {
        return $this->positionStartDate;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPositionEndDate(): ?\DateTimeInterface
    {
        return $this->positionEndDate;
    }

    /**
     * @return string
     */
    public function getPositionNumber(): ?string
    {
        return $this->positionNumber;
    }

    /**
     * @return string
     */
    public function getCustomerReference(): ?string
    {
        return $this->customerReference;
    }

    /**
     * @return string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    /**
     * @return string
     */
    public function getTransactionNumber(): ?string
    {
        return $this->transactionNumber;
    }

    /**
     * @return string
     */
    public function getExternalInvoiceNumber(): ?string
    {
        return $this->externalInvoiceNumber;
    }


    /**
     * @return InvoiceItem[]
     */
    public function getInvoiceItems(): array
    {
        return $this->invoiceItems;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    /**
     * @param string $vatNumber
     */
    public function setVatNumber(string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }

}
