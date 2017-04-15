<?php

use Smsapi\Client\Client;
use Smsapi\Client\Message\TextMessage;

require __DIR__ . '/../provide_goodies.php';

$client = Client::create($auth)->sms();

try {
    $statuses = $client->getSmsStatuses($smsIds);
    array_map('print_status', $statuses);
} catch (Throwable $e) {
    print_throwable($e);
}
