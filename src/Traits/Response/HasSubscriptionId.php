<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasSubscriptionId
{
    /**
     * @return string|null 
     */
    public function getSubscriptionId()
    {
        if (isset($this->getData()['subscriptionId'])) {
            return $this->getData()['subscriptionId'];
        }
    }
}
