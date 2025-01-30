<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasUnscheduledSubscription
{
    /**
     * @return array|null 
     */
    public function getUnscheduledSubscription()
    {
        if (isset($this->getData()['unscheduledSubscription'])) {
            return $this->getData()['unscheduledSubscription'];
        }
    }

    /**
     * @return string|null 
     */
    public function getUnscheduledSubscriptionId()
    {
        if (isset($this->getUnscheduledSubscription()['unscheduledSubscriptionId'])) {
            return $this->getUnscheduledSubscription()['unscheduledSubscriptionId'];
        }
    }
}
