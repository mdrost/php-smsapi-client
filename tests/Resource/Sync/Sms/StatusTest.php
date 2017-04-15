<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Resource\Sync\Sms;

use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;
use Smsapi\Client\ApiSettings;
use Smsapi\Client\Resource\Sms\Status;

class StatusTest extends AbstractResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Sync';
    }
    public function getClass() : string
    {
        return Status::class;
    }
    public function getNamespace() : string
    {
        return ApiSettings::NAMESPACE;
    }
}
