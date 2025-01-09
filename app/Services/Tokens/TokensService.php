<?php
/**
 * Description of TokensService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Tokens;

use App\Models\Token;
use App\Services\Tokens\Handlers\CreateTokenHandler;
use App\Services\Tokens\Handlers\InvalidateTokenHandler;
use App\Services\Tokens\Repositories\TokenRepository;

class TokensService
{
    public function __construct(
        private readonly TokenRepository $tokenRepository,
        private readonly CreateTokenHandler $createTokenHandler,
        private readonly InvalidateTokenHandler $invalidateTokenHandler,
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

    public function invalidateToken(Token $token): void
    {
        $this->invalidateTokenHandler->handle($token);
    }
}
