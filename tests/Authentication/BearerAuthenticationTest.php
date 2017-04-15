<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Authentication;

use Smsapi\Client\AuthenticationInterface;
use Smsapi\Client\Authentication\BearerAuthentication;
use Smsapi\Tests\Client\AbstractAuthenticationTest;

final class BearerAuthenticationTest extends AbstractAuthenticationTest
{
    /**
     * @return AuthenticationInterface
     */
    public function getAuthentication(): AuthenticationInterface
    {
        return new BearerAuthentication('token');
    }
}
