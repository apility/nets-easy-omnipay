<?php

require_once __DIR__ . '/helper.php';

$unscheduledSubscription = $gateway->createCard([
    'checkout' => [
        'returnUrl' => 'http://localhost:8000/callback.php',
        'termsUrl' => 'http://localhost:8000/terms.txt',
        'integrationType' => 'HostedPaymentPage',
        'merchantHandlesConsumerData' => true,
    ],
    'order' => [
        'reference' => '123456',
        'amount' => 0,
        'currency' => 'NOK',
        'items' => [
            [
                'reference' => '123456',
                'name' => 'Subscription',
                'quantity' => 1,
                'unit' => 'pcs',
                'unitPrice' => 0,
                'taxRate' => 0,
                'taxAmount' => 0,
                'grossTotalAmount' => 0,
                'netTotalAmount' => 0,
            ],
        ],
    ],
    'unscheduledSubscription' => [
        'create' => true
    ]
])->send();

if (!$unscheduledSubscription->isSuccessful()) {
    if ($unscheduledSubscription->isRedirect()) {
        return $unscheduledSubscription->redirect();
    }

    echo '<a href="index.php">Go back</a><br>';
    die('Authorize failed: ' . $unscheduledSubscription->getMessage());
}

header('Location: /callback.php?paymentid=' . $unscheduledSubscription->getPaymentId());
