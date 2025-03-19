<?php

require_once __DIR__ . '/helper.php';

if (!isset($_GET['paymentid'])) {
    echo '<a href="index.php">Go back</a><br>';
    die('Missing paymentid');
}

$transaction = $gateway->fetchTransaction(['paymentId' => $_GET['paymentid']])->send();

if (!$transaction->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die($transaction->getMessage());
}

if (!$transaction->getChargedAmount()) {
    echo '<a href="index.php">Go back</a><br>';
    die('No charge found for payment: ' . $transaction->getPaymentId());
}

if ($transaction->getRefundedAmount() === $transaction->getChargedAmount()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Payment refunded: ' . $transaction->getRefundId());
}

$refund = $gateway->refund([
    'paymentId' => $transaction->getPaymentId(),
    'amount' => $transaction->getOrderDetails()['amount'],
])->send();

if (!$refund->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Refund failed: ' . $refund->getMessage());
}

echo '<a href="index.php">Go back</a><br>';
die('Payment refunded: ' . $refund->getRefundId());
