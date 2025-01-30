<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

trait HasIdempotencyKey
{
    /**
     * @return string|null
     */
    public function getIdempotencyKey()
    {
        if (isset($this->headers['Idempotency-Key'])) {
            return $this->headers['Idempotency-Key'];
        }
    }

    /**
     * @param string $value
     * @return static
     */
    public function setIdempotencyKey($value)
    {
        $this->headers['Idempotency-Key'] = $value;
        return $this;
    }
}
