<?php

namespace Apility\Omnipay\NetsEasy\Message\Response;

use Apility\Omnipay\NetsEasy\Traits\Response;

class AuthorizeResponse extends AbstractRedirectResponse
{
    use Response\HasPaymentId;
    use Response\HasHostedPaymentPageUrl;

    /**
     * @return string|null
     */
    public function getRedirectUrl()
    {
        return $this->getHostedPaymentPageUrl();
    }
}
