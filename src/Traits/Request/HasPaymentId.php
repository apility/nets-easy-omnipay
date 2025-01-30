<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasPaymentId
{
    /**
     * @return string|null 
     */
    public function getPaymentId()
    {
        return $this->getParameter('paymentId');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setPaymentId($value)
    {
        return $this->setParameter('paymentId', $value);
    }
}
