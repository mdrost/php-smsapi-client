<?php declare(strict_types=1);

namespace Smsapi\Client\Sms;

use React\Promise\PromiseInterface;
use Rx\Observable;
use Smsapi\Client\Message\TextMessage;

interface AsyncClientInterface
{
    /**
     * @param  string      $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return PromiseInterface
     */
    public function sendSms(
        string $to,
        TextMessage $message,
        array $additionalOptions = []
    ): PromiseInterface;

    /**
     * @param  array       $to
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return Observable
     */
    public function sendBulkSms(
        array $to,
        TextMessage $message,
        array $additionalOptions = []
    ): Observable;

    /**
     * @param  string      $group
     * @param  TextMessage $message
     * @param  array       $additionalOptions
     * @return Observable
     */
    public function sendGroupSms(
        string $group,
        TextMessage $message,
        array $additionalOptions = []
    ): Observable;

    /**
     * @param  string $id
     * @return PromiseInterface
     */
    public function getSmsStatus(string $id): PromiseInterface;

    /**
     * @param  string $id
     * @return Observable
     */
    public function getSmsStatuses(array $ids): Observable;
}
