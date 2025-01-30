<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasSubscriptionId
{
    /**
     * @return string|null
     */
    public function getSubscriptionId()
    {
        return $this->getParameter('subscriptionId');
    }

    /**
     * @param string $value
     * @return static
     */
    public function setSubscriptionId($value)
    {
        return $this->setParameter('subscriptionId', $value);
    }
}
