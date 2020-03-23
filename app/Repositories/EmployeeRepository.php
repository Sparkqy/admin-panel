<?php

namespace App\Repositories;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Services\Uploaders\ImageUploader;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @param EmployeeRequest $request
     * @return Employee
     */
    public function store(EmployeeRequest $request): Employee
    {
        $profileImagePath = $request->has('profile_image')
            ? ImageUploader::uploadProfileImage($request->file('profile_image'))
            : Employee::NO_PROFILE_IMAGE_PATH;

        return Employee::create([
            'name' => ucwords($request->name),
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'profile_image' => $profileImagePath,
            'salary' => $request->salary,
            'position_id' => $request->position_id,
            'head_id' => $request->head_id,
            'admin_created_id' => Auth::id(),
            'date_of_employment' => Carbon::parse($request->date_of_employment)->format('Y-m-d'),
        ]);
    }

    /**
     * @param Employee $employee
     * @param EmployeeRequest $request
     * @return bool
     */
    public function update(Employee $employee, EmployeeRequest $request): bool
    {
        $data = [
            'name' => ucwords($request->name),
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'salary' => $request->salary,
            'position_id' => $request->position_id,
            'head_id' => $request->head_id,
            'admin_created_id' => Auth::id(),
            'date_of_employment' => Carbon::parse($request->date_of_employment)->format('Y-m-d'),
        ];

        if ($request->has('profile_image')) {
            $profileImagePath = ImageUploader::updateProfileImage($request->file('profile_image'), $employee->profile_image);
            $data['profile_image'] = $profileImagePath;
        }

        return $employee->update($data);
    }

    /**
     * @param Employee $employee
     * @throws Exception
     */
    public function destroy(Employee $employee): void
    {
        ImageUploader::deleteProfileImage($employee->profile_image);
        $employee->delete();
    }
}
