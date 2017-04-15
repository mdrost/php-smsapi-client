<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Command\Sms;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("Smsapi\Client\CommandBus\Handler\Sms\GetSmsStatusesHandler")
 */
final class GetSmsStatusesCommand
{
    /**
     * @var array
     */
    private $ids;

    /**
     * @param array $ids
     */
    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return array
     */
    public function getIds(): array
    {
        return $this->ids;
    }
}
