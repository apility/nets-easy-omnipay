<?php

namespace Apility\Omnipay\NetsEasy;

use Omnipay\Common\AbstractGateway;

use Apility\Omnipay\NetsEasy\Message\Request;

class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Nets Easy';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantNumber' => '',
            'secretKey' => '',
            'checkoutKey' => '',
            'testMode' => false,
        );
    }

    /**
     * @return string|null $value 
     */
    public function getMerchantNumber()
    {
        return $this->getParameter('merchantNumber');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setMerchantNumber($value)
    {
        return $this->setParameter('merchantNumber', $value);
    }

    /**
     * @return string|null
     */
    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    /**
     * @return string|null $value 
     */
    public function getCheckoutKey()
    {
        return $this->getParameter('checkoutKey');
    }

    /**
     * @param string $value 
     * @return static
     */
    public function setCheckoutKey($value)
    {
        return $this->setParameter('checkoutKey', $value);
    }

    /**
     * @return bool
     */
    public function getTestMode()
    {
        return !!$this->getParameter('testMode');
    }

    /**
     * @param bool $value
     * @return static
     */
    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    /**
     * @param array $parameters
     * @return Request\AuthorizeRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-payments-post
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-unscheduledsubscriptions-unscheduledsubscriptionid-charges-post
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest(Request\AuthorizeRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\CaptureRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-payments-paymentid-charges-post
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest(Request\CaptureRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\RefundRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-charges-chargeid-refunds-post
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(Request\RefundRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\VoidRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-payments-paymentid-cancels-post
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest(Request\VoidRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\FetchTransactionRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-payments-paymentid-get
     */
    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest(Request\FetchTransactionRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\CreateUnscheduledSubscriptionRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-payments-post
     */
    public function createUnscheduledSubscription(array $parameters = [])
    {
        return $this->createRequest(Request\CreateUnscheduledSubscriptionRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\UpdateUnscheduledSubscriptionRequest
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-payments-post
     */
    public function updateUnscheduledSubscription(array $parameters = [])
    {
        return $this->createRequest(Request\UpdateUnscheduledSubscriptionRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return Request\FetchUnscheduledSubscriptionRequest|null
     * @see https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/#v1-unscheduledsubscriptions-unscheduledsubscriptionid-get
     */
    public function fetchUnscheduledSubscription(array $parameters = [])
    {
        return $this->createRequest(Request\FetchUnscheduledSubscriptionRequest::class, $parameters);
    }

    /**
     * Alias of createUnscheduledSubscription to match the Omnipay naming convention
     * @param array $parameters
     * @return Request\CreateUnscheduledSubscriptionRequest
     * @see \Apility\Omnipay\NetsEasy\Gateway::createUnscheduledSubscription()
     */
    public function createCard(array $parameters = [])
    {
        return $this->createRequest(Request\CreateUnscheduledSubscriptionRequest::class, $parameters);
    }

    /**
     * Alias of updateUnscheduledSubscription to match the Omnipay naming convention
     * @param array $parameters
     * @return Request\UpdateUnscheduledSubscriptionRequest
     * @see \Apility\Omnipay\NetsEasy\Gateway::updateUnscheduledSubscription()
     */
    public function updateCard(array $parameters = [])
    {
        return $this->createRequest(Request\UpdateUnscheduledSubscriptionRequest::class, $parameters);
    }

    /**
     * Alias of fetchUnscheduledSubscription to match the Omnipay naming convention
     * @param array $parameters
     * @return Request\FetchUnscheduledSubscriptionRequest|null
     * @see \Apility\Omnipay\NetsEasy\Gateway::fetchUnscheduledSubscription()
     */
    public function fetchCard(array $parameters = [])
    {
        return $this->createRequest(Request\FetchUnscheduledSubscriptionRequest::class, $parameters);
    }
}
