<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasMyReference
{
    /**
     * @return string|null 
     */
    public function getMyReference()
    {
        if (isset($this->data['myReference'])) {
            return $this->data['myReference'];
        }
    }
}
