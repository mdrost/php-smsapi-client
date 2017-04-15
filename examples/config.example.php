<?php

use Smsapi\Client\Authentication\BasicAuthentication;
use Smsapi\Client\Authentication\BearerAuthentication;

require_once __DIR__ . '/../vendor/autoload.php';

$auth = new BasicAuthentication('username', '5f4dcc3b5aa765d61d8327deb882cf99');
//$auth = new BearerAuthentication('token');

$phoneNumber = '+48500000000';

$smsIds = [
    '12345678901234567890',
    '12345678900987654321',
];

$smsId = $smsIds[0];

$groupName = 'Test';
