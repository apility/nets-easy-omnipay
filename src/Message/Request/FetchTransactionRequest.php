<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Traits\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * @method Response\FetchTransactionResponse send()
 */
class FetchTransactionRequest extends AbstractRequest
{
    use Request\HasCommercePlatformTag;
    use Request\HasPaymentId;

    /**
     * @var class-string<Response\FetchTransactionResponse>
     */
    protected $responseClass = Response\FetchTransactionResponse::class;

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return HttpRequest::METHOD_GET;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->buildEndpoint(sprintf('payments/%s', $this->getPaymentId()));
    }
}
