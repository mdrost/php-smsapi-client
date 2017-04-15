<?php declare(strict_types=1);

namespace Smsapi\Client\Resource\Sync\Sms;

use ApiClients\Foundation\Hydrator\CommandBus\Command\BuildAsyncFromSyncCommand;
use React\Promise\PromiseInterface;
use Smsapi\Client\Resource\Async\Sms\Status as AsyncStatus;
use Smsapi\Client\Resource\Sms\Status as BaseStatus;

class Status extends BaseStatus
{
    /**
     * @return Status
     */
    public function refresh(): Status
    {
        return $this->wait($this->handleCommand(
            new BuildAsyncFromSyncCommand(self::HYDRATE_CLASS, $this)
        )->then(function (AsyncStatus $status): PromiseInterface {
            return $status->refresh();
        }));
    }
}
