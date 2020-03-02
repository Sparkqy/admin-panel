<?php

namespace App\Repositories;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Repositories\Interfaces\PositionRepositoryInterface;

class PositionRepository implements PositionRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function store(PositionRequest $request): Position
    {
        return Position::create(['name' => $request->name]);
    }

    /**
     * @inheritDoc
     */
    public function update(Position $position, PositionRequest $request): bool
    {
        return $position->update(['name' => ucwords($request->name)]);
    }

    /**
     * @inheritDoc
     */
    public function destroy(Position $position): void
    {
        $position->delete();
    }
}
