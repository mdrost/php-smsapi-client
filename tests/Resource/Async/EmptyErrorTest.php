<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Resource\Async;

use ApiClients\Tools\ResourceTestUtilities\AbstractEmptyResourceTest;
use Smsapi\Client\Resource\Async\EmptyError;

final class EmptyErrorTest extends AbstractEmptyResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Async';
    }
    public function getClass() : string
    {
        return EmptyError::class;
    }
}
