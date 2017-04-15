<?php declare(strict_types=1);

namespace Smsapi\Client;

use ApiClients\Foundation\Hydrator\Options as HydratorOptions;
use ApiClients\Foundation\Options as FoundationOptions;
use ApiClients\Foundation\Transport\Middleware\JsonDecodeMiddleware;
use ApiClients\Foundation\Transport\Options as TransportOptions;
use ApiClients\Middleware\HttpExceptions\HttpExceptionsMiddleware;
use ApiClients\Middleware\UserAgent\Options as UserAgentMiddlewareOptions;
use ApiClients\Middleware\UserAgent\UserAgentMiddleware;
use ApiClients\Middleware\UserAgent\UserAgentStrategies;
use function ApiClients\Foundation\options_merge;

final class ApiSettings
{
    const NAMESPACE = 'Smsapi\\Client\\Resource';

    const TRANSPORT_OPTIONS = [
        FoundationOptions::HYDRATOR_OPTIONS => [
            HydratorOptions::NAMESPACE => self::NAMESPACE,
            HydratorOptions::NAMESPACE_DIR => __DIR__ . DIRECTORY_SEPARATOR . 'Resource' . DIRECTORY_SEPARATOR,
        ],
        FoundationOptions::TRANSPORT_OPTIONS => [
            TransportOptions::SCHEMA => 'https',
            TransportOptions::HOST => 'api.smsapi.pl',
            TransportOptions::MIDDLEWARE => [
                JsonDecodeMiddleware::class,
                HttpExceptionsMiddleware::class,
                UserAgentMiddleware::class,
            ],
            TransportOptions::DEFAULT_REQUEST_OPTIONS => [
                TransportOptions::HEADERS => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                UserAgentMiddleware::class => [
                    UserAgentMiddlewareOptions::STRATEGY => UserAgentStrategies::PACKAGE_VERSION,
                    UserAgentMiddlewareOptions::PACKAGE => 'mdrost/smsapi-client',
                ],
            ],
        ],
    ];

    public static function getOptions(
        AuthenticationInterface $auth,
        array $suppliedOptions,
        string $suffix
    ): array {
        $options = options_merge(self::TRANSPORT_OPTIONS, $auth->getOptions());
        $options = options_merge($options, $suppliedOptions);
        $options[FoundationOptions::HYDRATOR_OPTIONS][HydratorOptions::NAMESPACE_SUFFIX] = $suffix;
        return $options;
    }
}
