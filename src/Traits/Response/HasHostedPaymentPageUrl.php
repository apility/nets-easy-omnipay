<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasHostedPaymentPageUrl
{
    /**
     * @return string|null 
     */
    public function getHostedPaymentPageUrl()
    {
        if (isset($this->getData()['hostedPaymentPageUrl'])) {
            return $this->getData()['hostedPaymentPageUrl'];
        }
    }
}
