<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

use Apility\Omnipay\NetsEasy\Traits\Response\Summary;

trait HasSummary
{
    use Summary\HasReservedAmount;
    use Summary\HasChargedAmount;
    use Summary\HasRefundedAmount;
    use Summary\HasCancelledAmount;

    /**
     * @return array|null 
     */
    public function getSummary()
    {
        if (isset($this->getData()['summary'])) {
            return $this->getData()['summary'];
        }
    }
}
