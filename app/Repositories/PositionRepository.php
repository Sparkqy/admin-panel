<?php

namespace App\Repositories;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Repositories\Interfaces\PositionRepositoryInterface;
use Exception;

class PositionRepository implements PositionRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function store(PositionRequest $request): Position
    {
        return Position::create([
            'name' => $request->name,
            'admin_created_id' => auth()->id(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function update(Position $position, PositionRequest $request): bool
    {
        return $position->update([
            'name' => ucwords($request->name),
            'admin_updated_id' => auth()->id(),
        ]);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function destroy(Position $position): void
    {
        $position->delete();
    }
}
