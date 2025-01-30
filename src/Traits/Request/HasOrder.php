<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasOrder
{
    /**
     * @return array|null
     */
    public function getOrder()
    {
        return $this->getParameter('order');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setOrder($value)
    {
        return $this->setParameter('order', $value);
    }
}
