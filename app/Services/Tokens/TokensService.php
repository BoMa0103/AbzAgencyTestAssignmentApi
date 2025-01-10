<?php

namespace App\Services\Tokens;

use App\Models\Token;
use App\Services\Tokens\Handlers\CreateTokenHandler;
use App\Services\Tokens\Handlers\InvalidateTokenHandler;
use App\Services\Tokens\Repositories\TokenRepository;
use App\Services\Tokens\Validators\RequestTokenValidator;
use Exception;
use Illuminate\Http\Request;

class TokensService
{
    public function __construct(
        private readonly TokenRepository $tokenRepository,
        private readonly CreateTokenHandler $createTokenHandler,
        private readonly InvalidateTokenHandler $invalidateTokenHandler,
        private readonly RequestTokenValidator $requestTokenValidator,
    ) {
    }

    public function createToken(): Token
    {
        return $this->createTokenHandler->handle();
    }

    public function findToken(string $token): ?Token
    {
        return $this->tokenRepository->findToken($token);
    }

    /**
     * @throws Exception
     */
    public function validateToken(Request $request): Token
    {
        return $this->requestTokenValidator->validate($request);
    }

    public function invalidateToken(Token $token): void
    {
        $this->invalidateTokenHandler->handle($token);
    }
}
