<?php

require_once __DIR__ . '/helper.php';

$authorization = $gateway->authorize([
    'checkout' => [
        'returnUrl' => 'http://localhost:8000/callback.php',
        'termsUrl' => 'http://localhost:8000/terms.txt',
        'integrationType' => 'HostedPaymentPage',
        'merchantHandlesConsumerData' => true,
    ],
    'order' => [
        'reference' => '123456',
        'amount' => 1000,
        'currency' => 'NOK',
        'items' => [
            [
                'reference' => '123456',
                'name' => 'Example product',
                'quantity' => 1,
                'unit' => 'pcs',
                'unitPrice' => 1,
                'taxRate' => 0,
                'taxAmount' => 0,
                'grossTotalAmount' => 1000,
                'netTotalAmount' => 1000,
            ],
        ]
    ],
])->send();

if (!$authorization->isSuccessful()) {
    if ($authorization->isRedirect()) {
        return $authorization->redirect();
    }

    echo '<a href="index.php">Go back</a><br>';
    die('Authorize failed: ' . $authorization->getMessage());
}

header('Location: /callback.php?paymentid=' . $authorization->getPaymentId());
