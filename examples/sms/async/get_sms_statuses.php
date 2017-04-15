<?php

use Smsapi\Client\AsyncClient;
use Smsapi\Client\Resource\Sms\StatusInterface;
use React\EventLoop\Factory as LoopFactory;

require __DIR__ . '/../../provide_goodies.php';

$loop = LoopFactory::create();
$client = AsyncClient::create($auth, $loop)->sms();

$client->getSmsStatuses($smsIds)->subscribe(function (StatusInterface $status) {
    print_status($status);
}, 'print_throwable');

$loop->run();
