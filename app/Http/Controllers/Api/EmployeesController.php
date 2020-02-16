<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Services\Datatables\DatatablesBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @throws \Exception
     */
    public function makeEmployeesDatatable()
    {
        return DatatablesBuilder::makeEmployeesDatatables();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function searchByName(Request $request): JsonResponse
    {
        $data = [];

        if ($request->has('q')) {
            $search = trim($request->input('term', ''));
            $data = User::where('name', 'LIKE', '%' . $search . '%')->get(['id', 'name as text']);
        }

        return response()->json(['results' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
