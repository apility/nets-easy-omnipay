<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasSubscription
{
    /**
     * @return array|null
     */
    public function getSubscription()
    {
        return $this->getParameter('subscription');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setSubscription($value)
    {
        return $this->setParameter('subscription', $value);
    }

    /**
     * @return string|null
     */
    public function getSubscriptionId()
    {
        if (isset($this->getSubscription()['subscriptionId'])) {
            return $this->getSubscription()['subscriptionId'];
        }
    }

    /**
     * @param string $value
     * @return static
     */
    public function setSubscriptionId($value)
    {
        $subscription = $this->getSubscription() ? $this->getSubscription() : [];
        return $this->setSubscription(array_merge($subscription, ['subscriptionId' => $value]));
    }

    /**
     * @return int|null
     */
    public function getInterval()
    {
        if (isset($this->getSubscription()['interval'])) {
            return $this->getSubscription()['interval'];
        }
    }

    /**
     * @param int $value
     * @return static
     */
    public function setInterval($value)
    {
        $subscription = $this->getSubscription() ? $this->getSubscription() : [];
        return $this->setSubscription(array_merge($subscription, ['interval' => $value]));
    }

    /**
     * @return string|null
     */
    public function getEndDate()
    {
        if (isset($this->getSubscription()['endDate'])) {
            return $this->getSubscription()['endDate'];
        }
    }

    /**
     * @param string $value
     * @return static
     */
    public function setEndDate($value)
    {
        $subscription = $this->getSubscription() ? $this->getSubscription() : [];
        return $this->setSubscription(array_merge($subscription, ['endDate' => $value]));
    }
}
