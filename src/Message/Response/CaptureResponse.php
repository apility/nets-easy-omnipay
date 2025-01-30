<?php

namespace Apility\Omnipay\NetsEasy\Message\Response;

use Apility\Omnipay\NetsEasy\Traits\Response;

class CaptureResponse extends AbstractResponse
{
    use Response\HasChargeId;
}
