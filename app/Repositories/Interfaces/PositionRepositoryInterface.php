<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PositionRequest;
use App\Models\Position;

interface PositionRepositoryInterface
{
    /**
     * @param PositionRequest $request
     * @return Position
     */
    public function store(PositionRequest $request): Position;

    /**
     * @param Position $position
     * @param PositionRequest $request
     * @return bool
     */
    public function update(Position $position, PositionRequest $request): bool;

    /**
     * @param Position $position
     * @return void
     */
    public function destroy(Position $position): void;
}
