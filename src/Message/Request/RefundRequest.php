<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;

/**
 * @method Response\RefundResponse send()
 */
class RefundRequest extends AbstractRequest
{
    use Request\HasIdempotencyKey;
    use Request\HasPaymentId;
    use Request\HasAmount;
    use Request\HasOrderItems;
    use Request\HasMyReference;

    /**
     * @var class-string<Response\RefundResponse>
     */
    protected $responseClass = Response\RefundResponse::class;

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->buildEndpoint(sprintf('payments/%s/refunds', $this->getPaymentId()));
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = [];

        if ($amount = $this->getAmount()) {
            $data['amount'] = $amount;
        }

        if ($orderItems = $this->getOrderItems()) {
            $data['orderItems'] = $orderItems;
        }

        if ($myReference = $this->getMyReference()) {
            $data['myReference'] = $myReference;
        }

        return $data;
    }
}
