<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response\Summary;

trait HasReservedAmount
{
    /**
     * @return int|null 
     */
    public function getReservedAmount()
    {
        if (isset($this->getSummary()['reservedAmount'])) {
            return $this->getSummary()['reservedAmount'];
        }
    }
}
