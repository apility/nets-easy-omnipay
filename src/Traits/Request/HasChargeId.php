<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasChargeId
{
    /**
     * @return string|null 
     */
    public function getChargeId()
    {
        return $this->getParameter('chargeId');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setChargeId($value)
    {
        return $this->setParameter('chargeId', $value);
    }
}
