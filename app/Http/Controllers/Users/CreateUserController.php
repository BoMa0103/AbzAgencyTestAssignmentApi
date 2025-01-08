<?php
/**
 * Description of CreateUserController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;

class CreateUserController extends BaseUsersController
{
    public function __invoke(
        CreateUserRequest $request,
    ): JsonResponse {
        $userId = $this->getUsersService()->createUser($request->getDTO());

        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'message' => 'New user successfully registered',
        ]);
    }
}
