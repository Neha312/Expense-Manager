{{-- <div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                        {{-- <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp"> --}}
{{-- <h3>User Account</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>User Information</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="cols">ID</th>
                                        <th scope="cols">Name</th>
                                        <th scope="cols">Email</th>
                                        <th scope="cols">Action</th>
                                </thead>
                                <tbody> --}}
{{-- @foreach (Auth::user() as $user)
                                        <tr> --}}
{{-- <th>{{ $user->id }}</th> --}}
{{-- <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td> --}}
{{-- <a href="{{ url('edit', $pract->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{ url('/delete', $pract->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a> --}}
{{-- </td>
                                    </tr>
                                    @endforeach --}}
{{--
</tbody>
</table>
<nav> --}}

{{-- {{ $user->links() }} --}}


{{-- </nav>
<style>
    .w-5 {
        display: inline;
        width: 30px !important;
    }
</style>
</div>
</div>

</div>
</div>
</div>
</div> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"></script>

    <title>Edit Form</title>
</head>

<body>
    <h3 align="center">Logged User</h3>
    <div class="container mt-5">
        <div class="row" style="display: block">
            <div class="col">

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
{{-- {{ route('loggedUser', auth()->user()->id) }} --}}
