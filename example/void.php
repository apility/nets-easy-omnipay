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

if ($transaction->getRefundedAmount()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Cannot cancel a payment that has been refunded: ' . $transaction->getPaymentId());
}

if ($transaction->getChargedAmount()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Cannot cancel a payment that has been charged: ' . $transaction->getPaymentId());
}

if ($transaction->getCancelledAmount()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Payment already cancelled: ' . $transaction->getPaymentId());
}

$void = $gateway->void([
    'paymentId' => $transaction->getPaymentId(),
    'amount' => $transaction->getReservedAmount(),
])->send();

if (!$void->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Cancellation failed: ' . $void->getMessage());
}

echo '<a href="index.php">Go back</a><br>';
die('Cancellation successful: ' . $transaction->getPaymentId());
