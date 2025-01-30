<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasCheckout
{
    /**
     * @return array|null 
     */
    public function getCheckout()
    {
        if (isset($this->getData()['checkout'])) {
            return $this->getData()['checkout'];
        }
    }

    /**
     * @return string|null 
     */
    public function getCheckoutUrl()
    {
        if (isset($this->getCheckout()['url'])) {
            return $this->getCheckout()['url'];
        }
    }
}
