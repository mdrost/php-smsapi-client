<?php

use Smsapi\Client\Client;
use Smsapi\Client\Message\TextMessage;

require __DIR__ . '/../provide_goodies.php';

$client = Client::create($auth)->sms();

$message = new TextMessage('test');

try {
    $status = $client->sendSms($phoneNumber, $message, [
        'test' => 1,
    ]);
    print_status($status);
} catch (Throwable $e) {
    print_throwable($e);
}
