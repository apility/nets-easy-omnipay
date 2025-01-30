<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasCurrency
{
    /**
     * @return string|null 
     */
    public function getCurrency()
    {
        if (isset($this->getData()['currency'])) {
            return $this->getData()['currency'];
        }
    }
}
