<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasConsumer
{
    /**
     * @return array|null 
     */
    public function getConsumer()
    {
        if (isset($this->getData()['consumer'])) {
            return $this->getData()['consumer'];
        }
    }
}
