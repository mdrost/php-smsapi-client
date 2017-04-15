<?php declare(strict_types=1);

namespace Smsapi\Client\Exceptions;

use Smsapi\Client\Resource\ErrorInterface;
use Throwable;

final class ExceptionFactory
{
    /**
     * @param  ErrorInterface $error
     * @param  Throwable|null $previousException
     * @return ResponseException
     */
    public static function create(ErrorInterface $error, Throwable $previousException = null): ResponseException
    {
        return new ResponseException($error, $previousException);
    }
}
