<?php declare(strict_types=1);

namespace Smsapi\Client\Sms;

use ApiClients\Foundation\ClientInterface as FoundationClientInterface;
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;
use React\Promise\PromiseInterface;
use Rx\Observable;
use Smsapi\Client\CommandBus\Command\Sms\GetSmsStatusCommand;
use Smsapi\Client\CommandBus\Command\Sms\GetSmsStatusesCommand;
use Smsapi\Client\CommandBus\Command\Sms\SendBulkSmsCommand;
use Smsapi\Client\CommandBus\Command\Sms\SendGroupSmsCommand;
use Smsapi\Client\CommandBus\Command\Sms\SendSmsCommand;
use Smsapi\Client\Message\TextMessage;

final class AsyncClient implements AsyncClientInterface
{
    /**
     * @var FoundationClientInterface
     */
    private $client;

    /**
     * @param FoundationClientInterface $client
     */
    public function __construct(FoundationClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param  string      $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return PromiseInterface
     */
    public function sendSms(
        string $to,
        TextMessage $message,
        array $additionalOptions = []
    ): PromiseInterface {
        return $this->client->handle(
            new SendSmsCommand($to, $message, $additionalOptions)
        );
    }

    /**
     * @param  array       $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return Observable
     */
    public function sendBulkSms(
        array $to,
        TextMessage $message,
        array $additionalOptions = []
    ): Observable {
        return unwrapObservableFromPromise($this->client->handle(
            new SendBulkSmsCommand($to, $message, $additionalOptions)
        ));
    }

    /**
     * @param  string      $group
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return Observable
     */
    public function sendGroupSms(
        string $group,
        TextMessage $message,
        array $additionalOptions = []
    ): Observable {
        return unwrapObservableFromPromise($this->client->handle(
            new SendGroupSmsCommand($group, $message, $additionalOptions)
        ));
    }

    /**
     * @param  string $id
     * @return PromiseInterface
     */
    public function getSmsStatus(string $id): PromiseInterface
    {
        return $this->client->handle(
            new GetSmsStatusCommand($id)
        );
    }

    /**
     * @param  string $id
     * @return Observable
     */
    public function getSmsStatuses(array $ids): Observable
    {
        return unwrapObservableFromPromise($this->client->handle(
            new GetSmsStatusesCommand($ids)
        ));
    }
}
