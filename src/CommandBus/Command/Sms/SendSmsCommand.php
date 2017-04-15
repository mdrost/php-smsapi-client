<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Command\Sms;

use Smsapi\Client\Message\TextMessage;
use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("Smsapi\Client\CommandBus\Handler\Sms\SendSmsHandler")
 */
final class SendSmsCommand
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var TextMessage
     */
    private $message;

    /**
     * @var array
     */
    private $additionalOptions;

    /**
     * @param string $to
     * @param array  $additionalOptions
     */
    public function __construct(string $to, TextMessage $message, array $additionalOptions = [])
    {
        $this->to = $to;
        $this->message = $message;
        $this->additionalOptions = $additionalOptions;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
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
