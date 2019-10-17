<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

// Instantiate client
$client = new \Rezdy\Client(getenv('API_KEY'));

// Get list of products
$products = $client->availability->search()->exec();
var_dump($products);
