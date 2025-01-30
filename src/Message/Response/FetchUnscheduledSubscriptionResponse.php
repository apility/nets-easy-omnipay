<?php

namespace Apility\Omnipay\NetsEasy\Message\Response;

use Apility\Omnipay\NetsEasy\Traits\Response;

class FetchUnscheduledSubscriptionResponse extends AbstractResponse
{
    use Response\HasUnscheduledSubscriptionId;
    use Response\HasPaymentDetails;
}
