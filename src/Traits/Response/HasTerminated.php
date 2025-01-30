<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasTerminated
{
    /**
     * @return string|null 
     */
    public function getTerminated()
    {
        if (isset($this->getData()['terminated'])) {
            return $this->getData()['terminated'];
        }
    }
}
