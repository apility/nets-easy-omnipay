<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;

use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * @method Response\FetchUnscheduledSubscriptionResponse send()
 */
class FetchUnscheduledSubscriptionRequest extends AbstractRequest
{
    use Request\HasUnscheduledSubscriptionId;

    /**
     * @var class-string<Response\FetchUnscheduledSubscriptionResponse>
     */
    protected $responseClass = Response\FetchUnscheduledSubscriptionResponse::class;

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
        return $this->buildEndpoint(sprintf('unscheduledsubscriptions/%s', $this->getUnscheduledSubscriptionId()));
    }
}
