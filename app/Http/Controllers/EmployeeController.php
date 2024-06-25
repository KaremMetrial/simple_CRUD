<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('employee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'post' => 'required|string',
        ]);
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->post = $request->input('post');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/employee'), $filename);
            $employee->img = $filename;
        } else {
//            return $request;
            $employee->img = '';
        }
        $employee->save();
        return redirect()->route('employee.show');
    }

    public function show()
    {
        $employees = Employee::all();
        return view('employeeform', compact('employees'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employeeEdit', compact('employee'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'post' => 'required|string',
        ]);
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->post = $request->input('post');
        if ($request->hasFile('image')) {
            if ($employee->img && file_exists(public_path('uploads/employee/' . $employee->img))) {
                unlink(public_path('uploads/employee/' . $employee->img));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/employee'), $filename);
            $employee->img = $filename;
        }
        $employee->save();
        return redirect(route('employee.show'));
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect(route('employee.show'));
    }
}
