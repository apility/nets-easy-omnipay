<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasUnscheduledSubscriptionId
{
    /**
     * @return string|null 
     */
    public function getUnscheduledSubscriptionId()
    {
        return $this->getParameter('unscheduledSubscriptionId');
    }

    /**
     * @param string $value 
     * @return static 
     */
    public function setUnscheduledSubscriptionId($value)
    {
        return $this->setParameter('unscheduledSubscriptionId', $value);
    }
}
