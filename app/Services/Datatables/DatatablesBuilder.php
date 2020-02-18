<?php

namespace App\Services\Datatables;

use App\Models\Position;
use App\Models\Employee;
use Yajra\DataTables\DataTables;

class DatatablesBuilder
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function makeEmployeesDatatables()
    {
        $employees = Employee::select(['id', 'name', 'profile_image', 'position_id', 'date_of_employment', 'phone_number', 'email', 'salary']);

        return DataTables::of($employees)
            ->addColumn('actions', function (Employee $employee) {
                $actions = "<a href='" . route('employees.edit', $employee->id) . "' class='btn btn-sm btn-link'><i class='fa fa-pencil'></i></a>";
                $actions .= "<button class='btn btn-sm btn-link' id='remove-employee' data-id='$employee->id' data-name='$employee->name'><i class='fa fa-trash text-danger'></i></button>";
                return $actions;
            })
            ->addColumn('position', function (Employee $employee) {
                return $employee->position->name;
            })
            ->addColumn('profile_image', function (Employee $employee) {
                return "<img src='$employee->profile_image' alt='$employee->name profile image' class='image-sm'>";
            })
            ->rawColumns(['actions', 'profile_image'])
            ->make(true);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function makePositionsDatatables()
    {
        $positions = Position::select(['id', 'name', 'created_at', 'updated_at']);

        return DataTables::of($positions)
            ->addColumn('actions', function (Position $position) {
                $actions = "<a href='" . route('positions.edit', $position->id) . "' class='btn btn-sm btn-link'><i class='fa fa-pencil'></i></a>";
                $actions .= "<button class='btn btn-sm btn-link' id='remove-position' data-id='$position->id' data-name='$position->name'><i class='fa fa-trash text-danger'></i></button>";
                return $actions;
            })
            ->addColumn('updated_at', function (Position $position) {
                return $position->updated_at ? $position->updated_at->format('d.m.Y') : $position->created_at->format('d.m.Y');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
