<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasCreated
{
    public function getCreated()
    {
        if (isset($this->getData()['created'])) {
            return $this->getData()['created'];
        }
    }
}
