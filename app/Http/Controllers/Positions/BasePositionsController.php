<?php

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
