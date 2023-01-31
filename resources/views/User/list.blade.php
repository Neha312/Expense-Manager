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
</head>

<body>
    <div class="col">
        <h3 align="center">User Details</h3>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="cols">ID</th>
                    <th scope="cols">Name</th>
                    <th scope="cols">Email</th>
                    <th scope="cols">Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>


                        <td>
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

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
