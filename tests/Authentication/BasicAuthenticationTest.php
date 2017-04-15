<?php declare(strict_types=1);

namespace Smsapi\Tests\Client\Authentication;

use Smsapi\Client\AuthenticationInterface;
use Smsapi\Client\Authentication\BasicAuthentication;
use Smsapi\Tests\Client\AbstractAuthenticationTest;

final class BasicAuthenticationTest extends AbstractAuthenticationTest
{
    /**
     * @return AuthenticationInterface
     */
    public function getAuthentication(): AuthenticationInterface
    {
        return new BasicAuthentication('username', '5f4dcc3b5aa765d61d8327deb882cf99');
    }
}
