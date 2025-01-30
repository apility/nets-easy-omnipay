<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasEndDate
{
    /**
     * @return string|null 
     */
    public function getEndDate()
    {
        if (isset($this->getData()['endDate'])) {
            return $this->getData()['endDate'];
        }
    }
}
