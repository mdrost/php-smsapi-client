<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Handler\Sms;

use React\Promise\PromiseInterface;
use Smsapi\Client\CommandBus\Command\Sms\GetSmsStatusCommand;
use Smsapi\Client\Resource\Sms\StatusInterface;
use Smsapi\Client\Services\FetchAndHydrateService;

final class GetSmsStatusHandler
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
     * @param GetSmsCommand $command
     * @return PromiseInterface
     */
    public function handle(GetSmsStatusCommand $command): PromiseInterface
    {
        $options = [
            'status' => $command->getId(),
            'details' => 1,
            'format' => 'json',
        ];
        return $this->service->fetch(
            'api/sms.do?' . http_build_query($options),
            'list.0',
            StatusInterface::HYDRATE_CLASS
        );
    }
}
