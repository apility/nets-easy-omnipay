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
        if (method_exists($this, 'getTestMode')) {
            return $this->getTestMode() ? 'test.api.dibspayment.eu' : 'api.dibspayment.eu';
        }

        return 'api.dibspayment.eu';
    }
}
