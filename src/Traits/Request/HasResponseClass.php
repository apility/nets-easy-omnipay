<?php

namespace Apility\Omnipay\NetsEasy\Traits\Request;

use ReflectionClass;
use Omnipay\Common\Exception\RuntimeException;
use Apility\Omnipay\NetsEasy\Message\Response\AbstractResponse;

trait HasResponseClass
{
    protected $responseClass = AbstractResponse::class;

    /**
     * @return class-string<\Apility\Omnipay\NetsEasy\Message\Response\AbstractResponse> 
     */
    public function getResponseClass()
    {
        return $this->responseClass;
    }

    /**
     * @param int $status 
     * @param array|null $data 
     * @param array|null $headers 
     * @return AbstractResponse 
     * @throws RuntimeException 
     */
    protected function createResponse($status, $data, $headers = [])
    {
        $responseClass = $this->getResponseClass();
        $reflection = new ReflectionClass($responseClass);

        if (!is_subclass_of($responseClass, AbstractResponse::class) || $reflection->isAbstract()) {
            throw new RuntimeException(sprintf('Invalid response class: %s', $responseClass));
        }

        return $this->response = new $responseClass($this, $status, $data, $headers);
    }
}
