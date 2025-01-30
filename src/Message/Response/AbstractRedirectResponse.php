<?php

namespace Apility\Omnipay\NetsEasy\Message\Response;

use Omnipay\Common\Exception\RuntimeException;
use Omnipay\Common\Message\RedirectResponseInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

abstract class AbstractRedirectResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * This method is abstract and must be implemented in the child class.
     * @abstract
     */
    public function getRedirectUrl()
    {
        trigger_error(
            sprintf(
                'Class %s contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (%s::%s) in %s on line %d',
                static::class,
                AbstractRedirectResponse::class,
                __FUNCTION__,
                __FILE__,
                __LINE__
            ),
            E_USER_ERROR
        );
        die();
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        if ($this->getRedirectUrl() !== null) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getRedirectMethod()
    {
        return HttpRequest::METHOD_GET;
    }

    /**
     * @return array|null
     */
    public function getRedirectData()
    {
        return null;
    }
}
