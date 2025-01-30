<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasRefundId
{
    /**
     * @return string|null 
     */
    public function getRefundId()
    {
        if (isset($this->getData()['refundId'])) {
            return $this->getData()['refundId'];
        }
    }
}
