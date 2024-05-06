<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    
    public function store(EmployeeRequest $request)
    {
        try {
            $employee = new Employee();
            $employee->fill($request->validated());
            $employee->save();
    
            return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            // If an error occurs, redirect back with error message
            return redirect()->back()->with('error', 'Error creating employee: ' . $e->getMessage())->withInput();
        }
    }
    

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {   

        $employee->update($request->validated());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
