<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasCommercePlatformTag
{
    /**
     * @return string|null
     */
    public function getCommercePlatformTag()
    {
        if (isset($this->headers['CommercePlatformTag'])) {
            return $this->headers['CommercePlatformTag'];
        }
    }

    /**
     * @param string $value
     * @return static
     */
    public function setCommercePlatformTag($value)
    {
        $this->headers['CommercePlatformTag'] = $value;
        return $this;
    }
}
