<?php
namespace invoiceSDK\DataStructures;

class InvoiceItem
{
    /**
     * @var string $orderText
     */
    private $orderText;

    /**
     * @var int $quantity
     */
    private $quantity;

    /**
     * @var string $unit
     */
    private $unit;

    /**
     * @var string $currencyCode
     */
    private $currencyCode;

    /**
     * @var int $grossPrice
     */
    private $grossPrice;

    /**
     * @var int $rowSum
     */
    private $rowSum;

    /**
     * @var string $itemNumber
     */
    private $itemNumber;

    /**
     * @param string $orderText
     */
    public function setOrderText(string $orderText): self
    {
        $this->orderText = $orderText;

        return $this;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @param int $grossPrice
     */
    public function setGrossPrice(int $grossPrice): self
    {
        $this->grossPrice = $grossPrice;

        return $this;
    }

    /**
     * @param int $rowSum
     */
    public function setRowSum(int $rowSum): self
    {
        $this->rowSum = $rowSum;

        return $this;
    }

    /**
     * @param string $itemNumber
     */
    public function setItemNumber(string $itemNumber): self
    {
        $this->itemNumber = $itemNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderText(): string
    {
        return $this->orderText;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @return int
     */
    public function getGrossPrice(): int
    {
        return $this->grossPrice;
    }

    /**
     * @return int
     */
    public function getRowSum(): int
    {
        return $this->rowSum;
    }

    /**
     * @return string
     */
    public function getItemNumber(): string
    {
        return $this->itemNumber;
    }
}