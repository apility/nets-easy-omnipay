<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasPaymentId
{
    /**
     * @return string|null 
     */
    public function getPaymentId()
    {
        if (isset($this->getData()['paymentId'])) {
            return $this->getData()['paymentId'];
        }
    }
}
