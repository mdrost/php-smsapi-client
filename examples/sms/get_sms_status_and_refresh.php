<?php

use Smsapi\Client\Client;

require __DIR__ . '/../provide_goodies.php';

$client = Client::create($auth)->sms();

try {
    $status = $client->getSmsStatus($smsId);
    print_status($status);
    $status = $status->refresh();
    print_status($status);
} catch (Throwable $e) {
    print_throwable($e);
}
