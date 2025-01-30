<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasCredentials
{
    use HasMerchantNumber;
    use HasSecretKey;
    use HasCheckoutKey;

    /**
     * @return bool 
     */
    public function getTestMode()
    {
        return strpos($this->getSecretKey(), 'test-') === 0;
    }
}
