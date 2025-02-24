<?php

namespace App\Services\Tokens\Handlers;

use App\Models\Token;
use App\Services\Tokens\Repositories\TokenRepository;
use Illuminate\Support\Str;

class CreateTokenHandler
{
    public function __construct(
        private readonly TokenRepository $tokenRepository,
    ) {
    }

    public function handle(): Token
    {
        $token = Str::random(32);

        return $this->tokenRepository->createToken([
            'token' => $token,
            'expires_in' => now()->addMinutes(40)->timestamp,
        ]);
    }
}
