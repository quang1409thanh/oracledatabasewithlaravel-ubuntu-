<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
</head>

<body>
    <h1>Employee List</h1>
    <table border="1">
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Hire Date</th>
            <th>Actions</th> <!-- Thêm cột Actions -->
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->employee_id }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->hire_date }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->employee_id) }}">Sửa</a>
                <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button> <!-- Nút Xóa -->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>