<?php

require_once __DIR__ . '/helper.php';

if (!isset($_GET['paymentid'])) {
    echo '<a href="index.php">Go back</a><br>';
    die('Missing paymentid');
}

$response = $gateway->fetchTransaction($_GET)->send();

if ($response->getRefundedAmount() > 0) {
    echo '<a href="index.php">Go back</a><br>';
    die('Payment refunded: ' . $response->getRefundId());
}

if ($response->getCancelledAmount() > 0) {
    echo '<a href="index.php">Go back</a><br>';
    die('Payment cancelled: ' . $response->getPaymentId());
}

if ($response->getChargedAmount() == $response->getReservedAmount()) {

    header('Location: /index.php?success=1&paymentid=' . $response->getPaymentId());
}

die('Payment not completed');
