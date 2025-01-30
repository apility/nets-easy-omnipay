# Omnipay: Nets Easy

**Nets Easy driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Stripe support for Omnipay.

## Table Of Contents
* [Installation](#installation)
* [Basic Usage](#basic-usage)
    * [Initial setup](#initial-setup)
    * [Hosted Payment Page](#hosted-payment-page)
    * [Checkout JS SDK](#checkout-js-sdk)
        * [Backend](#backend)
        * [Frontend](#frontend)
* [Example implementation](#example-implementation)

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply require `league/omnipay` and `apility/nets-easy-omnipay` with Composer:

```
composer require league/omnipay apility/nets-easy-omnipay
```

## Basic Usage

The following gateway os provided by this package:

* [Nets Easy Payment API](https://developer.nexigroup.com/nexi-checkout/en-EU/api/payment-v1/)

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

### Initial setup

```php
<?php

use Omnipay\Common\GatewayFactory;
use Apility\Omnipay\NetsEasy\Gateway as NetsEasyGateway;

$factory = new GatewayFactory();
$gateway = $factory->create(NetsEasyGateway::class);

$gateway->setMerchantNumber(/* ... */);
$gateway->setSecretKey(/* ... */);
$gateway->setCheckoutKey(/* ... */);
```

### Hosted Payment Page

If you don't want to host the checkout page yourself (EmbeddedCheckout), you may the the HostedPaymentPage integration type.
This will use a checkout page hosted by Nexi Group.

authorize.php
```php
```php
<?php

use Apility\Omnipay\NetsEasy\Types\Checkout\IntegrationType;

$authorization = $gateway->authorize([
    // ...
    'checkout' => [
        // ...
        'returnUrl' => 'http://example.com/callback.php',
        'integrationType' => IntegrationType::HostedPaymentPage
        // ...
    ]
])->send();

if (!$authorization->isSuccessful()) {
    if ($authorization->isRedirect()) {
        return $authorization->redirect();
    }

    die('Authorize failed: ' . $authorization->getMessage());
}

header('Location: /callback.php?paymentid=' . $authorization->getPaymentId());
```

callback.php
```php
<?php

$transaction = $gateway->fetchTransaction(['paymentId' => $_GET['paymentid']])->send();

if (!$transaction->isSuccessful()) {
    die('Failed to fetch transaction: ' . $transaction->getMessage());
}

if ($transaction->getChargedAmount()) {
    header('Location: /receipt.php?paymentid=' . $transaction->getPaymentId());
    return;
}

if ($transaction->getCancelledAmount() > 0) {
    die('Payment was cancelled: ' . $transaction->getPaymentId());
    return;
}

if ($transaction->getRefundedAmount() > 0) {
    die('Payment refunded: ' . $transaction->getPaymentId());
}

if ($transaction->getUnscheduledSubscriptionId()) {
    header('Location: /unscheduledSubscriptionCallback.php?paymentid=' . $transaction->getPaymentId());
    return;
}

header('Location: /capture.php?paymentid=' . $transaction->getPaymentId());
```

capture.php
```php
<?php

$transaction = $gateway->fetchTransaction(['paymentId' => $_GET['paymentid']])->send();

if (!$transaction->isSuccessful()) {
    die('Failed to fetch transaction: ' . $transaction->getMessage());
}

if ($transaction->getCancelledAmount() > 0) {
    die('Cannot capture payment, already cancelled: ' . $transaction->getPaymentId());
}

if ($transaction->getRefundedAmount() > 0) {
    die('Cannot capture payment, already refunded: ' . $transaction->getPaymentId());
}

if (!$transaction->getReservedAmount()) {
    header('Location: ' . $transaction->getCheckoutUrl());
    return;
}

if ($transaction->getChargedAmount() == $transaction->getReservedAmount()) {
    header('Location: /receipt.php?paymentid=' . $transaction->getPaymentId());
    return;
}

$capture = $gateway->capture([
    'paymentId' => $transaction->getPaymentId(),
    'amount' => $transaction->getReservedAmount(),
])->send();

if (!$capture->isSuccessful()) {
    die('Capture failed: ' . $capture->getMessage());
}

header('Location: /receipt.php&paymentid=' . $transaction->getPaymentId());
```

### Checkout JS SDK

The Nets Easy integration is fairly straight forward. Essentially you just pass
the `checkoutKey` and `paymentId` fields through to Nets Easy instead of the regular authorization flow.

Start by following the standard Stripe JS guide here:
[https://developer.nexigroup.com/nexi-checkout/en-EU/api/checkout-js-sdk/](https://developer.nexigroup.com/nexi-checkout/en-EU/api/checkout-js-sdk/)

Example:

#### Backend
```php
<?php

use Apility\Omnipay\NetsEasy\Types\Checkout\IntegrationType;

$authorization = $gateway->authorize([
    // ...
    'checkout' => [
        // ...
        'integrationType' => IntegrationType::EmbeddedCheckout
        // ...
    ]
])->send();

if (!$authorization->isSuccessful()) {
    die('Authorization failed: ' . $authorization->getMessage());
}

$paymentId = $authorization->getPaymentId();
$checkoutKey = $gateway->getCheckoutKey();
```

#### Frontend
```html
<!-- Production -->
<script src="https://checkout.dibspayment.eu/v1/checkout.js?v=1"></script>
<!-- Test -->
<script src="https://test.checkout.dibspayment.eu/v1/checkout.js?v=1"></script>
<script>
    const checkoutOptions = {
        checkoutKey: "<?php echo $checkoutKey; ?>",
        paymentId : "<?php echo $paymentId; ?>",
        containerId : "checkout-container-div",
        language: "en-GB"
    };
    
    const checkout = new Dibs.Checkout(checkoutOptions);

    checkout.on('payment-completed', function(response) {
        window.location.href = '/callback.php?paymentid=' + response.paymentId;
    });
</script>

<div id="checkout-container-div"></div>
</html>
```

## Example Implementation

A fully implemented example can be found in the [example](/example) directory.

To serve this example navigate to the example directory and start up a php server on port 8000:

```bash
cd examples
php -S localhost:8000
```

You need valid credentials for Nets Easy to run the examples.

Copy the [.env.example](/example/.env.example) file to a new file named `.env` in the same directory. Add your credentials to the `.env` file.

You can now open [http://localhost:8000](http://localhost:8000) in your browser.

---

Copyright &copy; 2025 Apility AS