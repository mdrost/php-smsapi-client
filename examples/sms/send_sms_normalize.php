<?php

use Smsapi\Client\Client;
use Smsapi\Client\Message\TextMessage;

require __DIR__ . '/../provide_goodies.php';

$client = Client::create($auth)->sms();

$message = new TextMessage('Zażółć gęślą jaźń', [
    'encoding' => 'utf-8',
]);

try {
    $status = $client->sendSms($phoneNumber, $message, [
        'normalize' => 1,
        'test' => 1,
    ]);
    print_status($status);
} catch (Throwable $e) {
    print_throwable($e);
}
