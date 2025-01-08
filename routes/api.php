<?php
/**
 * Description of api.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

use App\Services\Routes\Api\ApiRoutesProvider;

app(ApiRoutesProvider::class)->register();
