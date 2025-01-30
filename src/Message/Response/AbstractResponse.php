<?php

namespace Apility\Omnipay\NetsEasy\Message\Response;

use Omnipay\Common\Message\AbstractResponse as OmnipayAbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

abstract class AbstractResponse extends OmnipayAbstractResponse implements RedirectResponseInterface
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var int
     */
    protected $statusCode = null;

    /**
     * @param RequestInterface $request 
     * @param int $statusCode 
     * @param string|null $data 
     * @param array|null $headers 
     * @return void 
     */
    public function __construct(RequestInterface $request, $statusCode, $data, $headers = [])
    {
        $this->request = $request;
        $this->statusCode = $statusCode;
        $this->data = json_decode($data, true);
        $this->headers = $headers;
    }

    /**
     * @return array|null
     */
    public function getData()
    {
        if (isset($this->data)) {
            return $this->data;
        }

        return null;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        if ($this->isRedirect()) {
            return false;
        }

        return $this->getStatusCode() >= 200 && $this->getStatusCode() < 300;
    }

    /**
     * @return string|null
     */
    public function getMessage()
    {
        if (!$this->isSuccessful()) {
            if (isset($this->data['errors'])) {
                $property = array_keys($this->data['errors'])[0];
                return sprintf('%s: %s', $property, $this->data['errors'][$property][0]);
            }

            if (isset($this->data['message'])) {
                return $this->data['message'];
            }

            if ($statusCode = $this->getStatusCode()) {
                if (isset(HttpResponse::$statusTexts[$statusCode])) {
                    return HttpResponse::$statusTexts[$statusCode];
                }

                return sprintf('Status code %d', $statusCode);
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return false;
    }
}
