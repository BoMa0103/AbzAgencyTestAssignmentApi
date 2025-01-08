<?php
/**
 * Description of CreateUserController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Users\UsersService;

abstract class BaseUsersController extends Controller
{
    protected function getUsersService(): UsersService
    {
        return app(UsersService::class);
    }
}
