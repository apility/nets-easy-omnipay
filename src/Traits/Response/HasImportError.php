<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

trait HasImportError
{
    /**
     * @return array|null 
     */
    public function getImportError()
    {
        if (isset($this->getData()['importError'])) {
            return $this->getData()['importError'];
        }
    }
}
