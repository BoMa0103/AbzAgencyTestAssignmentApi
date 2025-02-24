<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\Requests\IndexUsersRequest;
use App\Http\Controllers\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class IndexUsersController extends BaseUsersController
{
    public function __invoke(
        IndexUsersRequest $request,
    ): JsonResponse {
        $users = $this->getUsersService()->getUsers($request->getDTO());
        if ($users->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Users not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'total' => $this->getUsersService()->getUsersCount(),
            'page' => $request->getDTO()->getPage(),
            'count' => $request->getDTO()->getCount(),
            'users' => UserResource::collection($users),
        ]);
    }
}
