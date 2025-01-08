<?php
/**
 * Description of ApiRoutesProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Routes\Api;

use App\Http\Controllers\Positions\IndexPositionsController;
use App\Http\Controllers\Tokens\GetTokenController;
use App\Http\Controllers\Users\CreateUserController;
use App\Http\Controllers\Users\IndexUsersController;
use App\Http\Controllers\Users\ShowUserController;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider
{
    public function register(): void
    {
        Route::post(
            'users',
            CreateUserController::class,
        )->name(ApiRoutes::USERS_CREATE);
        Route::get(
            'users',
            IndexUsersController::class,
        )->name(ApiRoutes::USERS_INDEX);
        Route::get(
            'users/{id}',
            ShowUserController::class,
        )->name(ApiRoutes::USERS_SHOW);

        Route::get(
            'positions',
            IndexPositionsController::class,
        )->name(ApiRoutes::POSITIONS_INDEX);

        Route::get(
            'token',
            GetTokenController::class,
        )->name(ApiRoutes::GET_TOKEN);
    }
}
