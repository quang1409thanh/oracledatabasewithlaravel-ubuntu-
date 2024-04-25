<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        // Lấy danh sách tất cả khách hàng từ cơ sở dữ liệu
        $customers = Customer::all();

        // Trả về view 'customers.index' với danh sách khách hàng đã lấy
        return view('customers.index', compact('customers'));
    }
    /**
     * Hiển thị form tạo mới khách hàng.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
        ]);

        // Tạo một khách hàng mới
        $customer = Customer::create($validatedData);

        // Chuyển hướng đến trang danh sách khách hàng với thông báo thành công
        return redirect('/customers')->with('success', 'Customer created successfully.');
    }
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
        ]);

        // Cập nhật thông tin khách hàng
        $customer->update($validatedData);

        // Chuyển hướng đến trang danh sách khách hàng với thông báo thành công
        return redirect('/customers')->with('success', 'Customer updated successfully.');
    }
    public function destroy(Customer $customer)
    {
        // Xóa khách hàng
        $customer->delete();

        // Chuyển hướng đến trang danh sách khách hàng với thông báo thành công
        return redirect('/customers')->with('success', 'Customer deleted successfully.');
    }
}
