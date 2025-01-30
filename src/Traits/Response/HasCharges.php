<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasCharges
{
    /**
     * @return array|null 
     */
    public function getCharges()
    {
        if (isset($this->getData()['charges'])) {
            return $this->getData()['charges'];
        }
    }

    /**
     * @return string|null 
     */
    public function getChargeId()
    {
        if (isset($this->getData()['chargeId'])) {
            return $this->getData()['chargeId'];
        }

        if (isset($this->getCharges()[count($this->getCharges()) - 1]['chargeId'])) {
            return $this->getCharges()[count($this->getCharges()) - 1]['chargeId'];
        }
    }
}
