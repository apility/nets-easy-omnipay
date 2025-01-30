<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasChargeId
{
    /**
     * @return string|null 
     */
    public function getChargeId()
    {
        if (isset($this->getData()['chargeId'])) {
            return $this->getData()['chargeId'];
        }
    }
}
