<?php declare(strict_types=1);

namespace Smsapi\Client;

interface AuthenticationInterface
{
    public function getOptions(): array;
}
