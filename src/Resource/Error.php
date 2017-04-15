<?php declare(strict_types=1);

namespace Smsapi\Client\Resource;

use ApiClients\Foundation\Hydrator\Annotations\EmptyResource;
use ApiClients\Foundation\Hydrator\Annotations\Rename;
use ApiClients\Foundation\Resource\AbstractResource;

/**
 * @Rename(
 *     code="error"
 * )
 * @EmptyResource("EmptyError")
 */
abstract class Error extends AbstractResource implements ErrorInterface
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var int
     */
    protected $code;

    /**
     * @return string
     */
    public function message() : string
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function code() : int
    {
        return $this->code;
    }
}
