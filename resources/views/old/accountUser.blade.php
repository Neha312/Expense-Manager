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

    <title>Expense Manager</title>
    @include('layouts.navigation')
</head>


<body>

    <h3 align="center">Edit Form</h3>
    <div class="container mt -5">
        <div class="row gy-5" style="display: block;">
            <div class="col">
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                @if (Session::has('success'))
                    <p class="text-danger">{{ Session::get('success') }}</p>
                @endif
                <form action="{{ route('createUseraccount') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <br><br>
                        <label for="bank_name" class="form-label">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name">
                        @error('name')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_no" class="form-label">Account No</label>
                        <input type="number" class="form-control" id="account_no" name="account_no">
                        @error('account_no')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="iafc_code" class="form-label">IAFC Code</label>
                        <input type="text" class="form-control" id="iafc_code" name="iafc_code">
                        @error('iafc_code')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="button" style=" text-align: center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <br>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col">
                <h3 align="center">Account Details</h3>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="cols">ID</th>
                            {{-- <th scope="cols">User ID</th> --}}
                            <th scope="cols">Bank Name</th>
                            <th scope="cols">Account No</th>
                            <th scope="cols">IAFC CODE</th>
                            <th scope="cols">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $acc)
                            <tr>
                                <th>{{ $acc->id }}</th>
                                {{-- <th>{{ $acc->user_id }}</th> --}}
                                <td>{{ $acc->bank_name }}</td>
                                <td>{{ $acc->account_no }}</td>
                                <td>{{ $acc->iafc_code }}</td>


                                <td>
                                    <a href="{{ url('edituserAccount', $acc->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('deleteuserAccount', $acc->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
