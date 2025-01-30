<?php

use Apility\Omnipay\NetsEasy\Gateway;
use Omnipay\Common\GatewayFactory;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load();

$factory = new GatewayFactory();
/** @var Gateway $gateway */
$gateway = $factory->create(Gateway::class);

$gateway->setMerchantNumber($_ENV['NETS_EASY_MERCHANT_NUMBER']);
$gateway->setSecretKey($_ENV['NETS_EASY_SECRET_KEY']);
$gateway->setCheckoutKey($_ENV['NETS_EASY_CHECKOUT_KEY']);
