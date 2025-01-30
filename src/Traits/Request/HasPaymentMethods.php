<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasPaymentMethods
{
    /**
     * @return array|null
     */
    public function getPaymentMethods()
    {
        return $this->getParameter('paymentMethods');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setPaymentMethods($value)
    {
        return $this->setParameter('paymentMethods', $value);
    }
}
