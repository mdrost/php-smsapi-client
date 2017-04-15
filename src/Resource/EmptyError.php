<?php declare(strict_types=1);

namespace Smsapi\Client\Resource;

use ApiClients\Foundation\Resource\EmptyResourceInterface;

abstract class EmptyError implements ErrorInterface, EmptyResourceInterface
{
    /**
     * @return string
     */
    public function message() : string
    {
        return null;
    }

    /**
     * @return int
     */
    public function code() : int
    {
        return null;
    }
}
