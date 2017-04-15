<?php

use Smsapi\Client\AsyncClient;
use Smsapi\Client\Message\TextMessage;
use Smsapi\Client\Resource\Sms\StatusInterface;
use React\EventLoop\Factory as LoopFactory;

require __DIR__ . '/../../provide_goodies.php';

$loop = LoopFactory::create();
$client = AsyncClient::create($auth, $loop)->sms();

$message = new TextMessage('test [%1%]', [
    'nounicode' => 1,
]);

$client->sendBulkSms([
    $phoneNumber,
    '+48500000000',
], $message, [
    'param1' => [
        'test',
        'Zażółć gęślą jaźń',
    ],
    'test' => 1,
])->subscribe(function (StatusInterface $status) {
    print_status($status);
}, 'print_throwable');

$loop->run();
