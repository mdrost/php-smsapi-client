<?php declare(strict_types=1);

namespace Smsapi\Tests\Client;

use ApiClients\Tools\TestUtilities\TestCase;
use Smsapi\Client\AuthenticationInterface;

abstract class AbstractAuthenticationTest extends TestCase
{
    /**
     * @return AuthenticationInterface
     */
    abstract public function getAuthentication(): AuthenticationInterface;

    /**
     * @return void
     */
    public function testOptionsReturnType()
    {
        self::assertInternalType('array', $this->getAuthentication()->getOptions());
    }
}
