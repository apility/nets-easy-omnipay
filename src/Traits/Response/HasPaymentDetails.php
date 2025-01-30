<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasPaymentDetails
{
    /**
     * @return array|null 
     */
    public function getPaymentDetails()
    {
        if (isset($this->getData()['paymentDetails'])) {
            return $this->getData()['paymentDetails'];
        }
    }
}
