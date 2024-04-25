<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all();
        // dd($employees);
        return view('employees.index', compact('employees'));
    }
    public function edit(Employee $employee)
    {
        // Hiển thị form chỉnh sửa
        return view('employees.edit', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        // Xóa nhân viên
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Nhân viên đã được xóa thành công.');
    }
}
