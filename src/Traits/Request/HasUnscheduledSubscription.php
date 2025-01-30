<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasUnscheduledSubscription
{
    /**
     * @return array|null
     */
    public function getUnscheduledSubscription()
    {
        return $this->getParameter('unscheduledSubscription');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setUnscheduledSubscription($value)
    {
        return $this->setParameter('unscheduledSubscription', $value);
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

    /**
     * @param string $value
     * @return static
     */
    public function setUnscheduledSubscriptionId($value)
    {
        $unscheduledSubscription = $this->getUnscheduledSubscription() ? $this->getUnscheduledSubscription() : [];
        return $this->setUnscheduledSubscription(array_merge($unscheduledSubscription, ['unscheduledSubscriptionId' => $value]));
    }

    /**
     * @return bool|null
     */
    public function getCreate()
    {
        if (isset($this->getUnscheduledSubscription()['create'])) {
            return $this->getUnscheduledSubscription()['interval'];
        }
    }

    /**
     * @param bool $value
     * @return static
     */
    public function setCreate($value)
    {
        $unscheduledSubscription = $this->getUnscheduledSubscription() ? $this->getUnscheduledSubscription() : [];
        return $this->setUnscheduledSubscription(array_merge($unscheduledSubscription, ['create' => $value]));
    }

    /**
     * @return static
     */
    public function create()
    {
        return $this->setCreate(true);
    }
}
