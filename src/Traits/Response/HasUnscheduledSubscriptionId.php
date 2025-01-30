<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasUnscheduledSubscriptionId
{
    /**
     * @return string|null 
     */
    public function getUnscheduledSubscriptionId()
    {
        if (isset($this->getData()['unscheduledSubscriptionId'])) {
            return $this->getData()['unscheduledSubscriptionId'];
        }
    }
}
