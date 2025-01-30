<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasMyReference
{
    /**
     * @return string|null 
     */
    public function getMyReference()
    {
        return $this->getParameter('myReference');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setMyReference($value)
    {
        return $this->setParameter('myReference', $value);
    }
}
