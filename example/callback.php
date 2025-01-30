<?php

require_once __DIR__ . '/helper.php';

$transaction = $gateway->fetchTransaction(['paymentId' => $_GET['paymentid']])->send();

if (!$transaction->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die('Failed to fetch transaction: ' . $transaction->getMessage());
}

if ($transaction->getChargedAmount()) {
    header('Location: /completed.php?paymentid=' . $transaction->getPaymentId());
    return;
}

if ($transaction->getCancelledAmount() > 0) {
    echo '<a href="index.php">Go back</a><br>';
    die('Payment was cancelled: ' . $transaction->getPaymentId());
    return;
}

if ($transaction->getRefundedAmount() > 0) {
    echo '<a href="index.php">Go back</a><br>';
    die('Payment refunded: ' . $transaction->getPaymentId());
}

if ($transaction->getUnscheduledSubscriptionId()) {
    header('Location: /unscheduledSubscriptionCallback.php?paymentid=' . $transaction->getPaymentId());
    return;
}

header('Location: /capture.php?paymentid=' . $transaction->getPaymentId());
