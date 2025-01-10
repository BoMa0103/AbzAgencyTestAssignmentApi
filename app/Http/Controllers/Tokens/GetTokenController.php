<?php

namespace App\Http\Controllers\Tokens;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetTokenController extends BaseTokensController
{
    public function __invoke(Request $request): JsonResponse
    {
        $token = $this->getTokensService()->createToken();

        return response()->json([
            'success' => true,
            'token' => $token->token,
        ]);
    }
}
