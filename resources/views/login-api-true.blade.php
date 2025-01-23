<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Login Details</h1>

    <p style="text-align: center;"><strong>Message:</strong> {{ $message }}</p>

    @if($data)
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $data['id'] }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $data['country'] }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $data['city'] }}</td>
            </tr>
            <tr>
                <th>First Name</th>
                <td>{{ $data['firstName'] }}</td>
            </tr>
        </table>
    @else
        <p style="text-align: center; color: red;">No user data available.</p>
    @endif
</body>
</html>
