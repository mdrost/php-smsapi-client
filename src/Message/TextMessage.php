<?php declare(strict_types=1);

namespace Smsapi\Client\Message;

use function ApiClients\Foundation\options_merge;

final class TextMessage
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $additionalOptions;

    /**
     * @param string $message
     * @param array $additionalOptions
     */
    public function __construct(string $message, array $additionalOptions = [])
    {
        $this->message = $message;
        $this->additionalOptions = $additionalOptions;
    }

    /**
     * @return string
     */
    public function getMessage(): string
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
