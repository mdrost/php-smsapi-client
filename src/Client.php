<?php declare(strict_types=1);

namespace Smsapi\Client;

use ApiClients\Foundation\ClientInterface as FoundationClientInterface;
use ApiClients\Foundation\Factory as FoundationClientFactory;
use React\EventLoop\Factory as LoopFactory;
use React\EventLoop\LoopInterface;
use Smsapi\Client\Sms\Client as SmsClient;
use Smsapi\Client\Sms\ClientInterface as SmsClientInterface;

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
     * @param  AuthenticationInterface $auth
     * @param  array                   $options
     * @return self
     */
    public static function create(
        AuthenticationInterface $auth,
        array $options = []
    ): self {
        $loop = LoopFactory::create();
        $options = ApiSettings::getOptions($auth, $options, 'Sync');
        $client = FoundationClientFactory::create($loop, $options);
        return new self($client);
    }

    /**
     * @internal
     * @param FoundationClientInterface $client
     */
    public function __construct(FoundationClientInterface $client)
    {
        $this->client = new AsyncClient($client);
        $this->loop = $client->getFromContainer(LoopInterface::class);
    }

    /**
     * @return SmsClientInterface
     */
    public function sms(): SmsClientInterface
    {
        return new SmsClient($this->client->sms(), $this->loop);
    }
}
