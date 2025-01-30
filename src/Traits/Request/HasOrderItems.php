<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasOrderItems
{
    /**
     * @return array|null
     */
    public function getOrderItems()
    {
        return $this->getParameter('orderItems');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setOrderItems($value)
    {
        return $this->setParameter('orderItems', $value);
    }
}
