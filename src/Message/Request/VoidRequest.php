<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Symfony\Component\HttpFoundation\Request as HttpRequest;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;

/**
 * @method Response\VoidResponse send()
 */
class VoidRequest extends AbstractRequest
{
    use Request\HasCommercePlatformTag;
    use Request\HasPaymentId;
    use Request\HasAmount;
    use Request\HasOrderItems;

    /**
     * @var class-string<Response\VoidResponse>
     */
    protected $responseClass = Response\VoidResponse::class;

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->buildEndpoint(sprintf('payments/%s/terminate', $this->getPaymentId()));
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return HttpRequest::METHOD_PUT;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->buildData([
            'amount',
            'orderItems',
        ]);
    }
}
