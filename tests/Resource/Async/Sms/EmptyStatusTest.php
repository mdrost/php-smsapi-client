<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Resource\Async\Sms;

use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;
use Smsapi\Client\Resource\Async\Sms\EmptyStatus;

final class EmptyStatusTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Async';
    }
    public function getClass() : string
    {
        return EmptyStatus::class;
    }
}
