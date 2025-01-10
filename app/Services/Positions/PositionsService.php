<?php

namespace App\Services\Positions;

use App\Services\Positions\Repositories\PositionRepository;
use Illuminate\Support\Collection;

class PositionsService
{
    public function __construct(
        private readonly PositionRepository $positionRepository,
    ) {
    }

    public function getPositions(): Collection
    {
        return $this->positionRepository->getPositions();
    }
}
