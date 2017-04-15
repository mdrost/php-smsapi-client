<?php declare(strict_types=1);

namespace Smsapi\Client\Exceptions;

use Exception;
use Smsapi\Client\Resource\ErrorInterface;

class ResponseException extends Exception
{
    /**
     * @var ErrorInterface
     */
    private $error;

    /**
     * @param ErrorInterface $error
     * @param Throwable|null $previousException
     */
    public function __construct(ErrorInterface $error, Throwable $previousException = null)
    {
        parent::__construct($error->message(), $error->code(), $previousException);
        $this->error = $error;
    }

    /**
     * @return ErrorInterface
     */
    public function getError(): ErrorInterface
    {
        return $this->error;
    }
}
