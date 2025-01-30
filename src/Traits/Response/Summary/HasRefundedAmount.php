<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response\Summary;

trait HasRefundedAmount
{
    /**
     * @return int|null 
     */
    public function getRefundedAmount()
    {
        if (isset($this->getSummary()['refundedAmount'])) {
            return $this->getSummary()['refundedAmount'];
        }
    }
}
