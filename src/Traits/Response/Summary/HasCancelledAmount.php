<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response\Summary;

trait HasCancelledAmount
{
    /**
     * @return int|null 
     */
    public function getCancelledAmount()
    {
        if (isset($this->getSummary()['cancelledAmount'])) {
            return $this->getSummary()['cancelledAmount'];
        }
    }
}
