<?php

namespace Apility\Omnipay\NetsEasy\Traits\Response;

use Apility\Omnipay\NetsEasy\Traits\Response;

trait HasPayment
{
    use Response\HasPaymentId;
    use Response\HasCurrency;
    use Response\HasSummary;
    use Response\HasConsumer;
    use Response\HasPaymentDetails;
    use Response\HasOrderDetails;
    use Response\HasCheckout;
    use Response\HasCreated;
    use Response\HasRefunds;
    use Response\HasCharges;
    use Response\HasTerminated;
    use Response\HasSubscription;
    use Response\HasUnscheduledSubscription;
    use Response\HasMyReference;

    /**
     * @return array|null 
     */
    public function getData()
    {
        if (isset($this->data['payment'])) {
            return $this->data['payment'];
        }
    }

    /**
     * @return array|null 
     */
    public function getPayemnt()
    {
        return $this->getData();
    }
}
