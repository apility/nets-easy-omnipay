<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasShipping
{
    /**
     * @return array|null
     */
    public function getShipping()
    {
        return $this->getParameter('shipping');
    }

    /**
     * @param array $value
     * @return static
     */
    public function setShipping($value)
    {
        return $this->setParameter('shipping', $value);
    }
}
