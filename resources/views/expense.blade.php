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
</head>
@include('layouts.navigation')

<body>

    <h3 align="center">Expense Manager</h3>
    <div class="container mt -5">
        <div class="row gy-5" style="display: block;">
            <div class="col">
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                @if (Session::has('success'))
                    <p class="text-danger">{{ Session::get('success') }}</p>
                @endif
                <form action="{{ route('create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <br><br>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                        @error('description')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="entrydate" class="form-label">Entry Date</label>
                        <input type="date" class="form-control" id="entrydate" name="entrydate">
                        @error('entrydate')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount">
                        @error('marks')
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
                <h3 align="center">Expense Details</h3>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="cols">ID</th>
                            <th scope="cols">Name</th>
                            <th scope="cols">Description</th>
                            <th scope="cols">Entry Date</th>
                            <th scope="cols">Amount</th>
                            <th scope="cols">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $exp)
                            <tr>
                                <th>{{ $exp->id }}</th>
                                <td>{{ $exp->name }}</td>
                                <td>{{ $exp->description }}</td>
                                <td>{{ $exp->entrydate }}</td>
                                <td>{{ $exp->amount }}</td>

                                <td>
                                    <a href="{{ url('editExpense', $exp->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('deleteExpense', $exp->id) }}"
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
