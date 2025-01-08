<?php
/**
 * Description of CreateUserController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Positions;

use App\Http\Controllers\Controller;
use App\Services\Positions\PositionsService;

abstract class BasePositionsController extends Controller
{
    protected function getPositionsService(): PositionsService
    {
        return app(PositionsService::class);
    }
}
