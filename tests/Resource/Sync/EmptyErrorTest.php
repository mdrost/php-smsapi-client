<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Resource\Sync;

use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;
use Smsapi\Client\Resource\Sync\EmptyError;

final class EmptyErrorTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Sync';
    }
    public function getClass() : string
    {
        return EmptyError::class;
    }
}
