<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasRefunds
{
    /**
     * @return array|null 
     */
    public function getRefunds()
    {
        if (isset($this->getData()['refunds'])) {
            return $this->getData()['refunds'];
        }
    }

    /**
     * @return string|null 
     */
    public function getRefundId()
    {
        if (isset($this->getData()['refundId'])) {
            return $this->getData()['refundId'];
        }

        if (isset($this->getRefunds()[count($this->getRefunds()) - 1]['refundId'])) {
            return $this->getRefunds()[count($this->getRefunds()) - 1]['refundId'];
        }
    }
}
