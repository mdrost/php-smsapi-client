<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Resource\Sync\Sms;

use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;
use Smsapi\Client\Resource\Sync\Sms\EmptyStatus;

final class EmptyStatusTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Sync';
    }
    public function getClass() : string
    {
        return EmptyStatus::class;
    }
}
