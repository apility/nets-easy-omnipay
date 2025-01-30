<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasPaymentMethodReference
{
    /**
     * @return string|null
     */
    public function getPaymentMethodReference()
    {
        return $this->getParameter('paymentMethodReference');
    }

    /**
     * @param string $value
     * @return static
     */
    public function setPaymentMethodReference($value)
    {
        return $this->setParameter('paymentMethodReference', $value);
    }
}
