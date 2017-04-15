<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Command\Sms;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("Smsapi\Client\CommandBus\Handler\Sms\GetSmsStatusHandler")
 */
final class GetSmsStatusCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
