<?php declare(strict_types=1);

namespace Smsapi\Client\Sms;

use Smsapi\Client\Message\TextMessage;
use Smsapi\Client\Resource\Sms\StatusInterface;

interface ClientInterface
{
    /**
     * @param  string      $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return StatusInterface
     */
    public function sendSms(string $to, TextMessage $message, array $additionalOptions = []): StatusInterface;

    /**
     * @param  array       $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return StatusInterface[]
     */
    public function sendBulkSms(array $to, TextMessage $message, array $additionalOptions = []): array;

    /**
     * @param  string      $group
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return StatusInterface[]
     */
    public function sendGroupSms(string $group, TextMessage $message, array $additionalOptions = []): array;

    /**
     * @param  string $id
     * @return StatusInterface
     */
    public function getSmsStatus(string $id): StatusInterface;

    /**
     * @param  string $id
     * @return StatusInterface[]
     */
    public function getSmsStatuses(array $ids): array;
}
