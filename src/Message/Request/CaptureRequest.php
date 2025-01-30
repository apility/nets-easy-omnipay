<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;

/**
 * @method Response\CaptureResponse send()
 */
class CaptureRequest extends AbstractRequest
{
    use Request\HasIdempotencyKey;
    use Request\HasCommercePlatformTag;
    use Request\HasPaymentId;
    use Request\HasAmount;
    use Request\HasOrderItems;
    use Request\HasShipping;
    use Request\HasFinalCharge;
    use Request\HasMyReference;
    use Request\HasPaymentMethodReference;

    /**
     * @var class-string<Response\CaptureResponse>
     */
    protected $responseClass = Response\CaptureResponse::class;

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->buildEndpoint(sprintf('payments/%s/charges', $this->getPaymentId()));
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->buildData([
            'amount',
            'orderItems',
            'shipping',
            'finalCharge',
            'myReference',
            'paymentMethodReference',
        ]);
    }
}
