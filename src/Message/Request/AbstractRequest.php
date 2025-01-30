<?php

namespace Apility\Omnipay\NetsEasy\Message\Request;

use Apility\Omnipay\NetsEasy\Message\Response;
use Apility\Omnipay\NetsEasy\Traits\Request;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;
use Omnipay\Common\Exception\RuntimeException;

/**
 * @method Response\AbstractResponse send()
 */
abstract class AbstractRequest extends OmnipayAbstractRequest
{
    use Request\HasResponseClass;
    use Request\HasMerchantNumber;
    use Request\HasIdempotencyKey;
    use Request\HasCredentials;
    use Request\HasApiVersion;
    use Request\HasScheme;

    /**
     * @var bool
     */
    protected $zeroAmountAllowed = true;

    /**
     * @var bool
     */
    protected $negativeAmountAllowed = false;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

    /**
     * @param string $endpoint 
     * @return string 
     */
    protected function buildEndpoint($endpoint)
    {
        $scheme = $this->getScheme();
        $hostname = $this->getHostName();
        $path = sprintf('%s/%s', $this->getApiVersion(), $endpoint);

        return sprintf('%s://%s/%s', $scheme, $hostname, $path);
    }

    /**
     * @param array $parameters 
     * @return array
     */
    protected function buildData(array $parameters, array $merge = [])
    {
        $data = [];

        foreach ($parameters as $parameter) {
            if (method_exists($this, 'get' . ucfirst($parameter))) {
                if ($value = $this->{'get' . ucfirst($parameter)}()) {
                    $data[$parameter] = $value;
                }
            }
        }

        return array_merge($merge, $data);
    }

    /**
     * @return string
     */
    abstract public function getEndpoint();

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return HttpRequest::METHOD_POST;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        $headers = $this->headers;

        if ($this->getHttpMethod() === 'POST') {
            $headers['Content-Type'] = 'application/json';
        }

        if ($this->getSecretKey()) {
            $headers['Authorization'] = $this->getSecretKey();
        }

        return $headers;
    }

    /**
     * @param array|null $data 
     * @return AbstractResponse
     * @throws RuntimeException 
     */
    public function sendData($data)
    {
        $headers = array_merge(
            array(
                'Accept' => 'application/json',
            ),
            $this->getHeaders(),
        );

        $body = json_encode($data);
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $headers,
            $body
        );

        return $this->createResponse(
            $httpResponse->getStatusCode(),
            $httpResponse->getBody()->getContents(),
            $httpResponse->getHeaders()
        );
    }
}
