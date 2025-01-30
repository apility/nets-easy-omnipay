<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasCheckoutKey
{
    /**
     * @return string|null 
     */
    public function getCheckoutKey()
    {
        return $this->getParameter('checkoutKey');
    }

    /**
     * @param string $value 
     * @return static 
     */
    public function setCheckoutKey($value)
    {
        return $this->setParameter('checkoutKey', $value);
    }
}
