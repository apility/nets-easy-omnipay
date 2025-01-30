<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;

/**
 * @method Response\AuthorizeResponse send()
 */
class AuthorizeRequest extends AbstractRequest
{
    use Request\HasCommercePlatformTag;
    use Request\HasOrder;
    use Request\HasCheckout;
    use Request\HasNotifications;
    use Request\HasPaymentMethodsConfiguration;
    use Request\HasPaymentMethods;
    use Request\HasMyReference;
    use Request\HasAdditionalPaymentMethodData;
    use Request\HasUnscheduledSubscriptionId;

    /**
     * @var class-string<Response\AuthorizeResponse>
     */
    protected $responseClass = Response\AuthorizeResponse::class;

    /**
     * @return string
     */
    public function getEndpoint()
    {
        if ($this->getUnscheduledSubscriptionId()) {
            return $this->buildEndpoint(sprintf('unscheduledsubscriptions/%s/charges', $this->getUnscheduledSubscriptionId()));
        }

        return $this->buildEndpoint('payments');
    }

    /**
     * @return array
     */
    public function getData()
    {
        if ($this->getUnscheduledSubscriptionId()) {
            return $this->buildData([
                'order',
                'notifications',
            ]);
        }

        return $this->buildData([
            'order',
            'checkout',
            'merchantNumber',
            'notifications',
            'paymentMethodsConfiguration',
            'paymentMethods',
            'myReference',
            'additionalPaymentMethodData',
        ]);
    }
}
