<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response\Summary;

trait HasRefundedAmount
{
    /**
     * @return int|null 
     */
    public function getRefundedAmount()
    {
        $amount = 0;

        foreach ($this->getRefunds() ?? [] as $refund) {
            $amount += $refund['amount'] ?? 0;
        }

        return $amount;
    }
}
