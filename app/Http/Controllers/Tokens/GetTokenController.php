<?php
/**
 * Description of GetTokenController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Tokens;

use App\Http\Controllers\Users\BaseUsersController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetTokenController extends BaseUsersController
{
    public function __invoke(Request $request, string $user): JsonResponse
    {
        // $response = $this->getApiUsersService()->translateUser($user);
        // if (! $response) {
        //     abort(404);
        // }
        //
        return response()->json([]);
    }
}
