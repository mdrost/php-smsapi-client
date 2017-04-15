<?php declare(strict_types=1);

namespace Smsapi\Client;

use Smsapi\Client\Sms\AsyncClientInterface as AsyncSmsClientInterface;

interface AsyncClientInterface
{
    /**
     * @return AsyncSmsClientInterface
     */
    public function sms(): AsyncSmsClientInterface;
}
