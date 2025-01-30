<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasPaymentMethodsConfiguration
{
    /**
     * @return array|null
     */
    public function getPaymentMethodsConfiguration()
    {
        return $this->getParameter('paymentMethodsConfiguration');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setPaymentMethodsConfiguration($value)
    {
        return $this->setParameter('paymentMethodsConfiguration', $value);
    }
}
