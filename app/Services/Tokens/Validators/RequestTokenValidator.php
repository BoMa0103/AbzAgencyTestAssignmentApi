<?php
/**
 * Description of TokenValidator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Tokens\Validators;

use App\Models\Token;
use App\Services\Tokens\Repositories\TokenRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestTokenValidator
{
    public function __construct(
        private readonly TokenRepository $tokenRepository,
    ) {
    }

    /**
     * @throws Exception
     */
    public function validate(Request $request): Token
    {
        Log::warning('Token validation', [
            'headers' => $request->headers,
            'body' => $request->all(),
        ]);
        $token = $request->header('Token');

        if (! $token) {
            throw new Exception('Token is required');
        }

        $token = $this->tokenRepository->findToken($token);

        if (! $token) {
            throw new Exception('Invalid token');
        }

        if ($token->isExpired(now()->timestamp)) {
            throw new Exception('Token is expired');
        }

        return $token;
    }
}
