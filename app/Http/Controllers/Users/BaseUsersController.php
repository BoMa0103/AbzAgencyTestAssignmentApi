<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Tokens\TokensService;
use App\Services\Users\UsersService;

abstract class BaseUsersController extends Controller
{
    protected function getUsersService(): UsersService
    {
        return app(UsersService::class);
    }

    protected function getTokensService(): TokensService
    {
        return app(TokensService::class);
    }
}
