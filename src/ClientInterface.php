<?php declare(strict_types=1);

namespace Smsapi\Client;

use Smsapi\Client\Sms\ClientInterface as SmsClientInterface;

interface ClientInterface
{
    /**
     * @return SmsClientInterface
     */
    public function sms(): SmsClientInterface;
}
