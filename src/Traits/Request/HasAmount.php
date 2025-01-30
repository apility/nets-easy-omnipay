<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasAmount
{
    /**
     * @return int|null $value
     */
    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    /**
     * @param int $value
     * @return static
     */
    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }
}
