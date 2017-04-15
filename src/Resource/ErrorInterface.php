<?php declare(strict_types=1);

namespace Smsapi\Client\Resource;

use ApiClients\Foundation\Resource\ResourceInterface;

interface ErrorInterface extends ResourceInterface
{
    const HYDRATE_CLASS = 'Error';

    /**
     * @return string
     */
    public function message() : string;

    /**
     * @return int
     */
    public function code() : int;
}
