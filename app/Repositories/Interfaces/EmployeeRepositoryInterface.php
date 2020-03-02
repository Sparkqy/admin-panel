<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    /**
     * @param EmployeeRequest $request
     * @return Employee
     */
    public function store(EmployeeRequest $request): Employee;

    /**
     * @param Employee $employee
     * @param EmployeeRequest $request
     * @return bool
     */
    public function update(Employee $employee, EmployeeRequest $request): bool;

    /**
     * @param Employee $employee
     * @return void
     */
    public function destroy(Employee $employee): void;
}
