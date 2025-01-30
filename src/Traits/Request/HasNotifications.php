<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasNotifications
{
    /**
     * @return array|null
     */
    public function getNotifications()
    {
        return $this->getParameter('notifications');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setNotifications($value)
    {
        return $this->setParameter('notifications', $value);
    }
}
