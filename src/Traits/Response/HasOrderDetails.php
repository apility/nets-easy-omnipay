<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasOrderDetails
{
    /**
     * @return array|null 
     */
    public function getOrderDetails()
    {
        if (isset($this->getData()['orderDetails'])) {
            return $this->getData()['orderDetails'];
        }
    }
}
