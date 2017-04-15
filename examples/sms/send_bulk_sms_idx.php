<?php

use Smsapi\Client\Client;
use Smsapi\Client\Message\TextMessage;

require __DIR__ . '/../provide_goodies.php';

$client = Client::create($auth)->sms();

$message = new TextMessage('test');

try {
    $statuses = $client->sendBulkSms([
        $phoneNumber,
        '+48500000000',
    ], $message, [
        'idx' => [
            'foo|bar',
            'derp',
        ],
        'test' => 1,
    ]);
    array_map('print_status', $statuses);
} catch (Throwable $e) {
    print_throwable($e);
}
