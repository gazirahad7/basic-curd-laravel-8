<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index()

    {
        $employee = Employee::all();
        return view('pages.employee.index', compact('employee'));
    }
    public function create()
    {

       
        return view('pages.employee.create');
    
    }
    public function store(Request $request)
    
    {

        $request->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'required',
            'designation' => 'required',
        ]);
            

        //
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->designation = $request->designation;
        //$employee->status = $request->status;
        $employee->save();
        return redirect('employee')->with('success', 'Employee added successfully');
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('pages.employee.edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->designation = $request->designation;
        $employee->status = $request->status ==  true ? 1 : 0;
        $employee->update();
        return redirect('employee')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('employee')->with('success', 'Employee deleted successfully');
    }

}
    