<?php declare(strict_types=1);

namespace Smsapi\Client\Sms;

use function Clue\React\Block\await;
use React\EventLoop\LoopInterface;
use Rx\React\Promise;
use Smsapi\Client\Resource\Sms\StatusInterface;
use Smsapi\Client\Message\TextMessage;

final class Client implements ClientInterface
{
    /**
     * @var AsyncClientInterface
     */
    private $client;

    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @param AsyncClientInterface $client
     * @param LoopInterface        $loop
     */
    public function __construct(AsyncClientInterface $client, LoopInterface $loop)
    {
        $this->client = $client;
        $this->loop = $loop;
    }

    /**
     * @param  string      $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return StatusInterface
     */
    public function sendSms(string $to, TextMessage $message, array $additionalOptions = []): StatusInterface
    {
        return await(
            $this->client->sendSms($to, $message, $additionalOptions),
            $this->loop
        );
    }

    /**
     * @param  array       $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return StatusInterface[]
     */
    public function sendBulkSms(array $to, TextMessage $message, array $additionalOptions = []): array
    {
        return await(
            Promise::fromObservable(
                $this->client->sendBulkSms($to, $message, $additionalOptions)->toArray()
            ),
            $this->loop
        );
    }

    /**
     * @param  string      $group
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return StatusInterface[]
     */
    public function sendGroupSms(string $group, TextMessage $message, array $additionalOptions = []): array
    {
        return await(
            Promise::fromObservable(
                $this->client->sendGroupSms($group, $message, $additionalOptions)->toArray()
            ),
            $this->loop
        );
    }

    /**
     * @param  string $id
     * @return StatusInterface
     */
    public function getSmsStatus(string $id): StatusInterface
    {
        return await(
            $this->client->getSmsStatus($id),
            $this->loop
        );
    }

    /**
     * @param  string $id
     * @return StatusInterface[]
     */
    public function getSmsStatuses(array $ids): array
    {
        return await(
            Promise::fromObservable(
                $this->client->getSmsStatuses($ids)->toArray()
            ),
            $this->loop
        );
    }
}
