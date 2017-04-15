<?php declare(strict_types=1);

namespace Smsapi\Client\Resource\Async\Sms;

use React\Promise\PromiseInterface;
use Smsapi\Client\CommandBus\Command\Sms\GetSmsStatusCommand;
use Smsapi\Client\Resource\Sms\Status as BaseStatus;

class Status extends BaseStatus
{
    /**
     * @return PromiseInterface
     */
    public function refresh() : PromiseInterface
    {
        return $this->handleCommand(
            new GetSmsStatusCommand($this->id())
        );
    }
}
