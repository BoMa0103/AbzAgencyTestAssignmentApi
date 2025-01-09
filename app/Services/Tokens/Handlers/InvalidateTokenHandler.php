<?php
/**
 * Description of InvalidateTokenHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Tokens\Handlers;

use App\Models\Token;
use App\Services\Tokens\Repositories\TokenRepository;

class InvalidateTokenHandler
{
    public function __construct(
        private readonly TokenRepository $tokenRepository,
    ) {
    }

    public function handle(Token $token): void
    {
        $this->tokenRepository->updateFromArray(
            $token, [
                'expires_in' => now()->timestamp,
            ],
        );
    }
}
