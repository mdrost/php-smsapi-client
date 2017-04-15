<?php declare(strict_types=1);

namespace Smsapi\Client\Resource\Sms;

use ApiClients\Foundation\Resource\ResourceInterface;

interface StatusInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Sms\\Status';

    /**
     * @return string
     */
    public function id() : string;

    /**
     * @return float
     */
    public function points() : float;

    /**
     * @return string
     */
    public function number() : string;

    /**
     * @return string
     */
    public function status() : string;

    /**
     * @return string|null
     */
    public function idx();
}
