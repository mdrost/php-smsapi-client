<?php

use React\EventLoop\Factory as LoopFactory;
use React\Promise\PromiseInterface;
use Smsapi\Client\AsyncClient;
use Smsapi\Client\Resource\Sms\StatusInterface;

require_once __DIR__ . '/../../provide_goodies.php';

$loop = LoopFactory::create();
$client = AsyncClient::create($auth, $loop)->sms();

$client->getSmsStatus($smsId)->then(
    function (StatusInterface $status): PromiseInterface {
        print_status($status);
        return $status->refresh();
    },
    'print_throwable'
)->then('print_status', 'print_throwable');

$loop->run();
