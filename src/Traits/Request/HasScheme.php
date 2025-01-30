<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasScheme
{
    /**
     * @return string
     */
    public function getScheme()
    {
        return 'https';
    }
}
