<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasFinalCharge
{
    /**
     * @return bool|null 
     */
    public function getFinalCharge()
    {
        return $this->getParameter('finalCharge');
    }

    /**
     * @param bool $value 
     * @return static 
     */
    public function setFinalCharge($value)
    {
        return $this->setParameter('finalCharge', $value);
    }
}
