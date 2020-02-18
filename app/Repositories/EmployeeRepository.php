<?php

namespace App\Repositories;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Services\FileUploaders\ImageUploader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @param EmployeeStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(EmployeeStoreRequest $request)
    {
        $profileImagePath = $request->has('profile_image')
            ? ImageUploader::store($request->file('profile_image'), 'uploads/profile_images')
            : Employee::NO_PROFILE_IMAGE_PATH;

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'profile_image' => $profileImagePath,
            'salary' => $request->salary,
            'position_id' => $request->position_id,
            'head_id' => $request->head_id,
            'admin_created_id' => Auth::id(),
            'date_of_employment' => Carbon::parse($request->date_of_employment)->format('Y-m-d'),
        ]);

        return redirect()->route('employees.index')->with('success', 'New employee was successfully created.');
    }

    public function update(Employee $employee, EmployeeStoreRequest $request)
    {
        // TODO: Implement update() method.
    }

    public function destroy(Employee $employee)
    {
        // TODO: Implement destroy() method.
    }
}
