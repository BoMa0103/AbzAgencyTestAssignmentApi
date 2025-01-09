<?php
/**
 * Description of IndexPositionsController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Positions;

use App\Http\Controllers\Positions\Resources\PositionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexPositionsController extends BasePositionsController
{
    public function __invoke(Request $request): JsonResponse
    {
        $positions = $this->getPositionsService()->getPositions();
        if ($positions->isEmpty()) {
            response()->json([
                'success' => false,
                'message' => 'Positions not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'positions' => PositionResource::collection($positions),
        ]);
    }
}
