<?php declare(strict_types=1);

namespace Smsapi\Client;

use ApiClients\Foundation\ClientInterface as FoundationClientInterface;
use ApiClients\Foundation\Factory as FoundationClientFactory;
use React\EventLoop\LoopInterface;
use Smsapi\Client\Sms\AsyncClient as AsyncSmsClient;
use Smsapi\Client\Sms\AsyncClientInterface as AsyncSmsClientInterface;

final class AsyncClient implements AsyncClientInterface
{
    /**
     * @var FoundationClientInterface
     */
    private $client;

    /**
     * @param  AuthenticationInterface $auth
     * @param  LoopInterface           $loop
     * @param  array                   $options
     * @return self
     */
    public static function create(
        AuthenticationInterface $auth,
        LoopInterface $loop,
        array $options = []
    ): self {
        $options = ApiSettings::getOptions($auth, $options, 'Async');
        $client = FoundationClientFactory::create($loop, $options);
        return new self($client);
    }

    /**
     * @internal
     * @param FoundationClientInterface $client
     */
    public function __construct(FoundationClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return AsyncSmsClientInterface
     */
    public function sms(): AsyncSmsClientInterface
    {
        return new AsyncSmsClient($this->client);
    }
}
