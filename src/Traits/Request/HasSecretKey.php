<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasSecretKey
{
    /**
     * @return string|null
     */
    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    /**
     * @param string $value
     * @return static
     */
    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->getTestMode() ? 'test.api.dibspayment.eu' : 'api.dibspayment.eu';
    }
}
