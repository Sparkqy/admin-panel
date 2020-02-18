<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    /**
     * @param EmployeeStoreRequest $request
     * @return mixed
     */
    public function store(EmployeeStoreRequest $request);

    /**
     * @param Employee $employee
     * @param EmployeeStoreRequest $request
     * @return mixed
     */
    public function update(Employee $employee, EmployeeStoreRequest $request);

    /**
     * @param Employee $employee
     * @return mixed
     */
    public function destroy(Employee $employee);
}
