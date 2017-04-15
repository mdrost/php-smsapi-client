<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Handler\Sms;

use React\Promise\PromiseInterface;
use function React\Promise\resolve;
use Smsapi\Client\CommandBus\Command\Sms\GetSmsStatusesCommand;
use Smsapi\Client\Resource\Sms\StatusInterface;
use Smsapi\Client\Services\FetchAndIterateService;

final class GetSmsStatusesHandler
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
     * @param  GetSmsStatusesCommand $command
     * @return PromiseInterface
     */
    public function handle(GetSmsStatusesCommand $command): PromiseInterface
    {
        $options = [
            'status' => implode(',', $command->getIds()),
            'details' => 1,
            'format' => 'json',
        ];
        return resolve($this->service->iterate(
            'api/sms.do?' . http_build_query($options),
            'list',
            StatusInterface::HYDRATE_CLASS
        ));
    }
}
