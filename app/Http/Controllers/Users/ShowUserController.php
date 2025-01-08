<?php
/**
 * Description of ShowUserController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowUserController extends BaseUsersController
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $user = $this->getUsersService()->findById($id);
        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'user' => $user->toArray(),
        ]);
    }
}
