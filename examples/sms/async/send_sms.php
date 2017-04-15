<?php

use Smsapi\Client\AsyncClient;
use Smsapi\Client\Message\TextMessage;
use Smsapi\Client\Resource\Sms\StatusInterface;
use React\EventLoop\Factory as LoopFactory;

require __DIR__ . '/../../provide_goodies.php';

$loop = LoopFactory::create();
$client = AsyncClient::create($auth, $loop)->sms();

$message = new TextMessage('test')

$client->sendSms($phoneNumber, $message, [
    'test' => 1,
])->then(function (StatusInterface $status) {
    print_status($status);
}, 'print_throwable');

$loop->run();
