<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1>Welcome to Expense Manager</h1>
    <h2> Hi {{ $data['name'] }}, we’re glad you’re here! Following are your account details: <br>
        <table border="1">
            <thead>
                <tr>
                    <th scope="cols">Email</th>
                    <th scope="cols">Username</th>
                    <th scope="cols">Password</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data['email'] }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['password'] }}</td>
                </tr>
            </tbody>
        </table>
</body>

</html>
