<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Services\Currencies\CurrencyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeesController extends Controller
{
    /**
     * @var EmployeeRepositoryInterface
     */
    private EmployeeRepositoryInterface $employeeRepository;

    /**
     * EmployeesController constructor.
     * @param EmployeeRepositoryInterface $employeeRepository
     */
    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $currentCurrencySymbol = CurrencyService::getCurrentCurrency()->symbol;

        return \view('employees.index', compact('currentCurrencySymbol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $this->employeeRepository->store($request);

        return redirect()
            ->route('employees.index')
            ->with('success', 'New employee was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee): View
    {
        return \view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $this->employeeRepository->update($employee, $request);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee\'s information was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $this->employeeRepository->destroy($employee);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee was successfully deleted.');
    }
}
