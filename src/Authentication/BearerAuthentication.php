<?php declare(strict_types=1);

namespace Smsapi\Client\Authentication;

use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Foundation\Transport\Options as TransportOptions;
use ApiClients\Middleware\BearerAuthorization\BearerAuthorizationHeaderMiddleware;
use ApiClients\Middleware\BearerAuthorization\Options as BearerAuthorizationHeaderMiddlewareOptions;
use Smsapi\Client\AuthenticationInterface;

final class BearerAuthentication implements AuthenticationInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return [
            FoundationOptions::TRANSPORT_OPTIONS => [
                TransportOptions::MIDDLEWARE => [
                    BearerAuthorizationHeaderMiddleware::class,
                ],
                TransportOptions::DEFAULT_REQUEST_OPTIONS => [
                    BearerAuthorizationHeaderMiddleware::class => [
                        BearerAuthorizationHeaderMiddlewareOptions::TOKEN => $this->token,
                    ],
                ],
            ],
        ];
    }
}
