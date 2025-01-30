<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasCheckout
{
    /**
     * @return array|null 
     */
    public function getCheckout()
    {
        return $this->getParameter('checkout');
    }

    /**
     * @param array $value 
     * @return static 
     */
    public function setCheckout($value)
    {
        return $this->setParameter('checkout', $value);
    }
}
