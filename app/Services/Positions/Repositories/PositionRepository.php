<?php

namespace App\Services\Positions\Repositories;

use App\Models\Position;
use Illuminate\Support\Collection;

class PositionRepository
{
    public function getPositions(): Collection
    {
        return Position::all();
    }

    public function findById(int $id): ?Position
    {
        return Position::find($id);
    }
}
