<?php

require_once __DIR__ . '/helper.php';

if (!isset($_GET['unscheduledsubscriptionid'])) {
    echo '<a href="index.php">Go back</a><br>';
    die('Missing unscheduledsubscriptionid');
}

$authorization = $gateway->authorize()
    ->setUnscheduledSubscriptionId($_GET['unscheduledsubscriptionid'])
    ->setOrder([
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
    ]);

$transaction = $authorization->send();

if (!$transaction->isSuccessful()) {
    if ($transaction->isRedirect()) {
        return $transaction->redirect();
    }

    echo '<a href="index.php">Go back</a><br>';
    die('Purchase failed: ' . $transaction->getMessage());
}

header('Location: /callback.php?paymentid=' . $transaction->getPaymentId());
