<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasInterval
{
    /**
     * @return int|null 
     */
    public function getInterval()
    {
        if (isset($this->getData()['interval'])) {
            return $this->getData()['interval'];
        }
    }
}
