<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Repositories\Interfaces\PositionRepositoryInterface;
use App\Repositories\PositionRepository;
use App\Services\Datatables\DatatablesBuilder;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PositionsController extends Controller
{
    /**
     * @var PositionRepositoryInterface
     */
    private PositionRepositoryInterface $positionRepository;

    /**
     * PositionsController constructor.
     * @param PositionRepositoryInterface $positionRepository
     */
    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return \view('positions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionRequest $request
     * @return RedirectResponse
     */
    public function store(PositionRequest $request): RedirectResponse
    {
        $this->positionRepository->store($request);

        return redirect()
            ->route('positions.index')
            ->with('success', 'New position was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return View
     */
    public function edit(Position $position): View
    {
        return \view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionRequest $request
     * @param Position $position
     * @return RedirectResponse
     */
    public function update(PositionRequest $request, Position $position): RedirectResponse
    {
        $this->positionRepository->update($position, $request);

        return redirect()
            ->route('positions.index')
            ->with('success', 'Position\'s information was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return RedirectResponse
     */
    public function destroy(Position $position): RedirectResponse
    {
        $this->positionRepository->destroy($position);

        return redirect()
            ->route('positions.index')
            ->with('success', 'Position was successfully deleted.');
    }
}
