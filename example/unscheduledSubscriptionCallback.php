<?php

require_once __DIR__ . '/helper.php';

$transaction = $gateway->fetchTransaction(['paymentId' => $_GET['paymentid']])->send();

if (!$transaction->isSuccessful()) {
    echo '<a href="index.php">Go back</a><br>';
    die($transaction->getMessage());
}

if ($transaction->getUnscheduledSubscription()) {
    $unscheduledSubscription = $gateway->fetchCard([
        'unscheduledSubscriptionId' => $transaction->getUnscheduledSubscriptionId()
    ])->send();

    if (!$unscheduledSubscription->isSuccessful()) {
        echo '<a href="index.php">Go back</a><br>';
        die('Failed to fetch unscheduled subscription: ' . $unscheduledSubscription->getMessage());
    }

    header('Location: /index.php?success=1&unscheduledsubscriptionid=' . $unscheduledSubscription->getUnscheduledSubscriptionId());
}

die('No unscheduled subscription found');
