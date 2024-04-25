<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employees = [
            [
                'EMPLOYEE_ID' => 1,
                'FIRST_NAME' => 'John',
                'LAST_NAME' => 'Doe',
                'EMAIL' => 'john.doe@example.com',
                'HIRE_DATE' => '2024-04-25',
            ],
            [
                'EMPLOYEE_ID' => 2,
                'FIRST_NAME' => 'Jane',
                'LAST_NAME' => 'Smith',
                'EMAIL' => 'jane.smith@example.com',
                'HIRE_DATE' => '2024-04-26',
            ],
            [
                'EMPLOYEE_ID' => 3,
                'FIRST_NAME' => 'Michael',
                'LAST_NAME' => 'Johnson',
                'EMAIL' => 'michael.johnson@example.com',
                'HIRE_DATE' => '2024-04-27',
            ],
        ];

        // Insert dữ liệu vào bảng Employees
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
