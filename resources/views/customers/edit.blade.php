<!-- resources/views/customers/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 0 auto;
            width: 50%;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $customer->phone_number }}">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $customer->address }}">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" value="{{ $customer->birthdate ? \Carbon\Carbon::parse($customer->birthdate)->format('Y-m-d') : '' }}">
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>
