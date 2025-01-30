<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasSubscription
{
    /**
     * @return array|null 
     */
    public function getSubscription()
    {
        if (isset($this->getData()['subscription'])) {
            return $this->getData()['subscription'];
        }
    }

    /**
     * @return string|null 
     */
    public function getSubscriptionId()
    {
        if (isset($this->getSubscription()['id'])) {
            return $this->getSubscription()['id'];
        }
    }
}
