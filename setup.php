<?php

require_once __DIR__ . '/vendor/autoload.php';

use Viber\Client;

// $config = require __DIR__ . '/config/bot.php';

$webhookUrl = 'https://37d3d6d4334a.ngrok.io'; // <- PLACE-YOU-HTTPS-URL

try {
    $client = new Client(['token' => '']);
    $result = $client->setWebhook($webhookUrl);
    echo "Success\n";
} catch (Exception $e) {
    echo "Error: ". $e->getMessage() ."\n";
}
