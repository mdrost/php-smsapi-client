<?php declare(strict_types=1);

namespace Smsapi\Client\Resource\Sms;

use ApiClients\Foundation\Resource\EmptyResourceInterface;

abstract class EmptyStatus implements StatusInterface, EmptyResourceInterface
{
    /**
     * @return string
     */
    public function id() : string
    {
        return null;
    }

    /**
     * @return float
     */
    public function points() : float
    {
        return null;
    }

    /**
     * @return string
     */
    public function number() : string
    {
        return null;
    }

    /**
     * @return string
     */
    public function status() : string
    {
        return null;
    }

    /**
     * @return string|null
     */
    public function idx()
    {
        return null;
    }
}
