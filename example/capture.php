<?php

require_once __DIR__ . '/helper.php';

if (!isset($_GET['paymentid'])) {
    echo '<a href="index.php">Go back</a><br>';
    die('Missing paymentid');
}

$transaction = $gateway->fetchTransaction(['paymentId' => $_GET['paymentid']])->send();

if (!$transaction->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Failed to fetch transaction: ' . $transaction->getMessage());
}

if ($transaction->getCancelledAmount() > 0) {
    echo '<a href="index.php">Go back</a><br>';
    die('Cannot capture payment, already cancelled: ' . $transaction->getPaymentId());
}

if ($transaction->getRefundedAmount() > 0) {
    echo '<a href="index.php">Go back</a><br>';
    die('Cannot capture payment, already refunded: ' . $transaction->getPaymentId());
}

if (!$transaction->getReservedAmount()) {
    header('Location: ' . $transaction->getCheckoutUrl());
    return;
}

if ($transaction->getChargedAmount() == $transaction->getReservedAmount()) {
    header('Location: /completed.php?paymentid=' . $transaction->getPaymentId());
    return;
}

$capture = $gateway->capture([
    'paymentId' => $transaction->getPaymentId(),
    'amount' => $transaction->getReservedAmount(),
])->send();

if (!$capture->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Capture failed: ' . $capture->getMessage());
}

header('Location: /index.php?success=1&paymentid=' . $transaction->getPaymentId());
