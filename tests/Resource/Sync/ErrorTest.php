<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Resource\Sync;

use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;
use Smsapi\Client\ApiSettings;
use Smsapi\Client\Resource\Error;

class ErrorTest extends AbstractResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Sync';
    }
    public function getClass() : string
    {
        return Error::class;
    }
    public function getNamespace() : string
    {
        return ApiSettings::NAMESPACE;
    }
}
