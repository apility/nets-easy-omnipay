<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response\Summary;

trait HasChargedAmount
{
    /**
     * @return int|null 
     */
    public function getChargedAmount()
    {
        if (isset($this->getSummary()['chargedAmount'])) {
            return $this->getSummary()['chargedAmount'];
        }
    }
}
