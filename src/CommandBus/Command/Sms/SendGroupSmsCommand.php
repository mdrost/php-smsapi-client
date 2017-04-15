<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Command\Sms;

use Smsapi\Client\Message\TextMessage;
use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("Smsapi\Client\CommandBus\Handler\Sms\SendGroupSmsHandler")
 */
final class SendGroupSmsCommand
{
    /**
     * @var string
     */
    private $group;

    /**
     * @var TextMessage
     */
    private $message;

    /**
     * @var array
     */
    private $additionalOptions;

    /**
     * @param string $group
     * @param array  $additionalOptions
     */
    public function __construct(string $group, TextMessage $message, array $additionalOptions = [])
    {
        $this->group = $group;
        $this->message = $message;
        $this->additionalOptions = $additionalOptions;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return TextMessage
     */
    public function getMessage(): TextMessage
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getAdditionalOptions(): array
    {
        return $this->additionalOptions;
    }
}
