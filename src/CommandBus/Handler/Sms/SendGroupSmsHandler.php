<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Handler\Sms;

use function ApiClients\Foundation\options_merge;
use React\Promise\PromiseInterface;
use function React\Promise\resolve;
use Smsapi\Client\CommandBus\Command\Sms\SendGroupSmsCommand;
use Smsapi\Client\Resource\Sms\StatusInterface;
use Smsapi\Client\Services\FetchAndIterateService;

final class SendGroupSmsHandler
{
    /**
     * @var FetchAndIterateService
     */
    private $service;

    /**
     * @param FetchAndIterateService $service
     */
    public function __construct(FetchAndIterateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  SendGroupSmsCommand $command
     * @return PromiseInterface
     */
    public function handle(SendGroupSmsCommand $command): PromiseInterface
    {
        $message = $command->getMessage();
        $options = $message->getAdditionalOptions();
        $options = options_merge($options, $command->getAdditionalOptions());
        $options = options_merge($options, [
            'group' => $command->getGroup(),
            'message' => $message->getMessage(),
            'format' => 'json',
        ]);
        unset($options['to']);
        return resolve($this->service->iterate(
            'sms.do?' . http_build_query($options),
            'list',
            StatusInterface::HYDRATE_CLASS
        ));
    }
}
