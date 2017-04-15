<?php declare(strict_types=1);

namespace Smsapi\Client\CommandBus\Command\Sms;

use Smsapi\Client\Message\TextMessage;
use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("Smsapi\Client\CommandBus\Handler\Sms\SendBulkSmsHandler")
 */
final class SendBulkSmsCommand
{
    /**
     * @var array
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
     * @param array $to
     * @param array $additionalOptions
     */
    public function __construct(array $to, TextMessage $message, array $additionalOptions = [])
    {
        $this->to = $to;
        $this->message = $message;
        $this->additionalOptions = $additionalOptions;
    }

    /**
     * @return array
     */
    public function getTo(): array
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
