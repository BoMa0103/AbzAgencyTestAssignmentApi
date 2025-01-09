<?php
/**
 * Description of BaseTokensController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Tokens;

use App\Http\Controllers\Controller;
use App\Services\Tokens\TokensService;

abstract class BaseTokensController extends Controller
{
    protected function getTokensService(): TokensService
    {
        return app(TokensService::class);
    }
}
