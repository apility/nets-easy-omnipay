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

echo '<a href="index.php">Go back</a><br>';
echo ('Transaction fetched successfully: ' . $transaction->getPaymentId());
dd($transaction->getData());
