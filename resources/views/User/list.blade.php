<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"></script>
    <title>Document</title>
    @include('layouts.navigation')
</head>

<body>
    <div class="col">
        <h3 align="center">User Details</h3>
        <br>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="cols">Name</th>
                    <th scope="cols">Email</th>
                    <th scope="cols">Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('edit_user', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ url('delete_user', $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{ url('show_account') }}" class="btn btn-success btn-sm">Account</a>
                    </td>
                </tr>
            </tbody>
        </table>
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <nav>

            {{-- {{ $practices->links() }} --}}
        </nav>
        <style>
            .w-5 {
                display: inline;
                width: 30px !important;
            }
        </style>
    </div>
    </div>
    </div>
</body>

</html>
