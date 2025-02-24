<?php

namespace App\Services\Users\Exceptions;

use Exception;
use Throwable;

class UniqueUserEmailException extends Exception
{
    public function __construct(int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            'User with the same email already exists',
            $code,
            $previous
        );
    }
}
