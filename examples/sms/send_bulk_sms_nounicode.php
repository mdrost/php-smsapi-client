<?php

use Smsapi\Client\Client;
use Smsapi\Client\Message\TextMessage;

require __DIR__ . '/../provide_goodies.php';

$client = Client::create($auth)->sms();

$message = new TextMessage('test [%1%]', [
    'nounicode' => 1,
]);

try {
    $statuses = $client->sendBulkSms([
        $phoneNumber,
        '+48500000000',
    ], $message, [
        'param1' => [
            'test',
            'Zażółć gęślą jaźń',
        ],
        'test' => 1,
    ]);
    array_map('print_status', $statuses);
} catch (Throwable $e) {
    print_throwable($e);
}
