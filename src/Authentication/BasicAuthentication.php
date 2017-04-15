<?php declare(strict_types=1);

namespace Smsapi\Client\Authentication;

use Smsapi\Client\AuthenticationInterface;
use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Foundation\Transport\Options as TransportOptions;
use ApiClients\Middleware\BasicAuthorization\Options as BasicAuthorizationHeaderMiddlewareOptions;
use ApiClients\Middleware\BasicAuthorization\BasicAuthorizationHeaderMiddleware;

final class BasicAuthentication implements AuthenticationInterface
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return [
            FoundationOptions::TRANSPORT_OPTIONS => [
                TransportOptions::MIDDLEWARE => [
                    BasicAuthorizationHeaderMiddleware::class,
                ],
                TransportOptions::DEFAULT_REQUEST_OPTIONS => [
                    BasicAuthorizationHeaderMiddleware::class => [
                        BasicAuthorizationHeaderMiddlewareOptions::USERNAME => $this->username,
                        BasicAuthorizationHeaderMiddlewareOptions::PASSWORD => $this->password,
                    ],
                ],
            ],
        ];
    }
}
