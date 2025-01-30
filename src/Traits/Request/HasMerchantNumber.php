<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasMerchantNumber
{
    /**
     * @return string|null 
     */
    public function getMerchantNumber()
    {
        return $this->getParameter('merchantNumber');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setMerchantNumber($value)
    {
        return $this->setParameter('merchantNumber', $value);
    }
}
