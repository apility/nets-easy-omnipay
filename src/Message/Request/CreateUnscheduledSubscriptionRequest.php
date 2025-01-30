<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;

/**
 * @method Response\AuthorizeResponse send()
 */
class CreateUnscheduledSubscriptionRequest extends AuthorizeRequest
{
    use Request\HasUnscheduledSubscription;

    /**
     * @var class-string<Response\AuthorizeResponse>
     */
    protected $responseClass = Response\AuthorizeResponse::class;

    /**
     * @return array
     */
    public function getData()
    {
        return $this->buildData([
            'unscheduledSubscription',
        ], parent::getData());
    }
}
