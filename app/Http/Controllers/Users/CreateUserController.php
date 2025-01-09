<?php
/**
 * Description of CreateUserController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\Requests\CreateUserRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Nette\Utils\ImageException;

class CreateUserController extends BaseUsersController
{
    public function __invoke(
        CreateUserRequest $request,
    ): JsonResponse {
        try {
            $token = $this->getTokensService()->validateToken($request);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 401);
        }

        try {
            $userId = $this->getUsersService()->createUser($request->getDTO())->id;
        } catch (ImageException|Exception $e) {
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
