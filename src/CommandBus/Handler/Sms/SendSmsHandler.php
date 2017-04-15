<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Handler\Sms;

use function ApiClients\Foundation\options_merge;
use React\Promise\PromiseInterface;
use Smsapi\Client\CommandBus\Command\Sms\SendSmsCommand;
use Smsapi\Client\Resource\Sms\StatusInterface;
use Smsapi\Client\Services\FetchAndHydrateService;

final class SendSmsHandler
{
    /**
     * @var FetchAndHydrateService
     */
    private $service;

    /**
     * @param FetchAndHydrateService $service
     */
    public function __construct(FetchAndHydrateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param SendSmsCommand $command
     * @return PromiseInterface
     */
    public function handle(SendSmsCommand $command): PromiseInterface
    {
        $message = $command->getMessage();
        $options = $message->getAdditionalOptions();
        $options = options_merge($options, $command->getAdditionalOptions());
        $options = options_merge($options, [
            'to' => $command->getTo(),
            'message' => $message->getMessage(),
            'format' => 'json',
        ]);
        unset($options['group']);
        return $this->service->fetch(
            'sms.do?' . http_build_query($options),
            'list.0',
            StatusInterface::HYDRATE_CLASS
        );
    }
}
