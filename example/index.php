<?php

$success = isset($_GET['success']) && $_GET['success'] ? true : false;
$paymentId = isset($_GET['paymentid']) ? $_GET['paymentid'] : null;
$unscheduledSubscriptionId = isset($_GET['unscheduledsubscriptionid']) ? $_GET['unscheduledsubscriptionid'] : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examples | Nets Easy Omnipay</title>
</head>

<body>
    <h1>Nets Easy Omnipay Examples</h1>

    <?php if ($success) : ?>
        <h2>Success</h2>
        <?php if ($paymentId) { ?>
            <p>Payment ID: <?php echo $paymentId; ?></p>
        <? } ?>
        <?php if ($unscheduledSubscriptionId) { ?>
            <p>Unscheduled Subscription ID: <?php echo $unscheduledSubscriptionId; ?></p>
        <? } ?>
    <?php endif; ?>
    <ul>
        <li><a href="authorize.php">Initiate a payment authorization</a></li>
        <li><a href="createUnscheduledSubscription.php">Create unschedule subscription</a></li>
    </ul>

    <br>
    <hr>

    <h2>Fetch a transaction</h2>
    <form action="fetchTransaction.php" method="get">
        <label for="paymentId">Payment ID</label>
        <input type="text" name="paymentid" id="paymentId" placeholder="Payment ID" value="<?php echo $paymentId; ?>">
        <button type="submit">Fetch transaction</button>
    </form>

    <br>
    <hr>

    <h2>Capture a payment</h2>
    <form action="capture.php" method="get">
        <label for="paymentId">Payment ID</label>
        <input type="text" name="paymentid" id="paymentId" placeholder="Payment ID" value="<?php echo $paymentId; ?>">
        <button type="submit">Capture payment</button>
    </form>

    <br>
    <hr>

    <h2>Void a payment</h2>
    <form action="void.php" method="get">
        <label for="paymentId">Payment ID</label>
        <input type="text" name="paymentid" id="paymentId" placeholder="Payment ID" value="<?php echo $paymentId; ?>">
        <button type="submit">Void payment</button>
    </form>

    <br>
    <hr>

    <h2>Refund a payment</h2>
    <form action="refund.php" method="get">
        <label for="paymentId">Payment ID</label>
        <input type="text" name="paymentid" id="paymentId" placeholder="Payment ID" value="<?php echo $paymentId; ?>">
        <button type="submit">Refund payment</button>
    </form>

    <br>
    <hr>

    <h2>Pay with unscheduled subscription</h2>
    <form action="payWithUnscheduledSubscription.php" method="get">
        <label for="unscheduledSubscriptionId">Unscheduled Subscription ID</label>
        <input type="text" name="unscheduledsubscriptionid" id="unscheduledSubscriptionId" placeholder="Unscheduled Subscription ID" value="<?php echo $unscheduledSubscriptionId; ?>">
        <br>
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" placeholder="Amount" value="100">
        <br><br>
        <button type="submit">Pay with unscheduled subscription</button>
    </form>

    <br>
    <hr>
</body>

</html>