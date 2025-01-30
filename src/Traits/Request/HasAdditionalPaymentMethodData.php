<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasAdditionalPaymentMethodData
{
    /**
     * @return array|null 
     */
    public function getAdditionalPaymentMethodData()
    {
        return $this->getParameter('additionalPaymentMethodData');
    }

    /**
     * @param array $value 
     * @return static 
     */
    public function setAdditionalPaymentMethodData($value)
    {
        return $this->setParameter('additionalPaymentMethodData', $value);
    }
}
