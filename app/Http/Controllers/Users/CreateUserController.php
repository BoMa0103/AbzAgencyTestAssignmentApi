<?php
/**
 * Description of CreateUserController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\ImageException;

class CreateUserController extends BaseUsersController
{
    public function __invoke(
        CreateUserRequest $request,
        Request $httpRequest,
    ): JsonResponse {
        $token = $httpRequest->header('Token');

        if (! $token) {
            return response()->json([
                'success' => false,
                'message' => 'Token is required',
            ], 401);
        }

        $token = $this->getTokensService()->findToken($token);

        if (! $token) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid token',
            ], 401);
        }

        if ($token->isExpired(now()->timestamp)) {
            return response()->json([
                'success' => false,
                'message' => 'Token is expired',
            ], 401);
        }

        try {
            $userId = $this->getUsersService()->createUser($request->getDTO())->id;
        } catch (ImageException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }

        $this->getTokensService()->invalidateToken($token);

        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'message' => 'New user successfully registered',
        ]);
    }
}
