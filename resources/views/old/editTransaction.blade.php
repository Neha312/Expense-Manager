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

    <title>Edit Form</title>



<body>

    <h3 align="center">Edit Transaction</h3>
    <div class="container mt -5">
        <div class="row gy-5" style="display: block;">
            <div class="col">
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                @if (Session::has('success'))
                    <p class="text-danger">{{ Session::get('success') }}</p>
                @endif
                <form action="{{ route('updateTransaction', $transactions->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <br>
                        <label>Account</label>
                        <select class="form-control" name="account_id" id="account_id">
                            <option hidden>Choose Account</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account }}"></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <br>
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount">
                        @error('camount')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <br>
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                        @error('category')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <br>
                        <label>Type</label>
                        <select class="form-control" name="type" id="type">
                            <option hidden>Choose Type</option>
                            @foreach ($transactions as $transaction)
                                <option value="{{ $transaction->id }}">{{ $transaction->type }}</option>
                            @endforeach
                        </select>
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
                            <th scope="cols">Category</th>
                            <th scope="cols">Type</th>
                            <th scope="cols">Amount</th>
                            <th scope="cols">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <th>{{ $transaction->id }}</th>
                                <td>{{ $transaction->category }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->amount }}</td>


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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
