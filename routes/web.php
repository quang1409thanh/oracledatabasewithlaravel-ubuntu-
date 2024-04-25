<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\CustomerController;

// Route cho trang hiển thị danh sách khách hàng
Route::get('/customers', [CustomerController::class, 'index']);

// Route cho trang chỉnh sửa thông tin khách hàng
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// Route cho xóa khách hàng
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
// Route để xử lý việc lưu thông tin khách hàng mới
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
// Route để cập nhật thông tin khách hàng
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
