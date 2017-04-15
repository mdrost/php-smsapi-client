<?php

use Smsapi\Client\Resource\Sms\StatusInterface;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * @param  Throwable $throwable
 * @return void
 */
function print_throwable(Throwable $throwable)
{
    echo str_repeat('-', 30), PHP_EOL;
    echo 'Class:   ', get_class($throwable), PHP_EOL;
    echo 'Code:    ', $throwable->getCode(), PHP_EOL;
    echo 'Message: ', $throwable->getMessage(), PHP_EOL;
    echo str_repeat('-', 30), PHP_EOL;
    echo (string) $throwable, PHP_EOL;
}

/**
 * @param  StatusInterface $status
 * @return void
 */
function print_status(StatusInterface $status)
{
    echo str_repeat('-', 30), PHP_EOL;
    echo 'Class:  ', get_class($status), PHP_EOL;
    echo str_repeat('-', 30), PHP_EOL;
    echo 'Id:     ', $status->id(), PHP_EOL;
    echo 'Points: ', $status->points(), PHP_EOL;
    echo 'Number: ', $status->number(), PHP_EOL;
    echo 'Status: ', $status->status(), PHP_EOL;
    echo 'Idx:    ', $status->idx(), PHP_EOL;
}
