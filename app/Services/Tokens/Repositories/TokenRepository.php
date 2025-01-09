<?php
/**
 * Description of TokenRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Tokens\Repositories;

use App\Models\Token;

class TokenRepository
{
    public function updateFromArray(Token $token, array $data): Token
    {
        $token->update($data);

        return $token;
    }

    public function createToken(array $data): Token
    {
        return Token::create($data);
    }

    public function findToken(string $token): ?Token
    {
        return Token::query()
            ->where('token', $token)
            ->first();
    }
}
