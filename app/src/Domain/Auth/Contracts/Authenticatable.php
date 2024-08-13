<?php

declare(strict_types=1);

namespace Domain\Auth\Contracts;

use Domain\Auth\Token;
use Illuminate\Contracts\Auth\Authenticatable as IlluminateAuthenticatable;

interface Authenticatable extends IlluminateAuthenticatable
{
    public function setToken(Token $token): void;

    public function token(): Token;
}
