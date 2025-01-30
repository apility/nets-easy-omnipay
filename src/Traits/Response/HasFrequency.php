<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasFrequency
{
    /**
     * @return int|null 
     */
    public function getFrequency()
    {
        if (isset($this->getData()['frequency'])) {
            return $this->getData()['frequency'];
        }
    }
}
