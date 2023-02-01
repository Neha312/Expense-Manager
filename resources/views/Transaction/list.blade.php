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
    <title>Document</title>
    @include('layouts.navigation')
</head>

<body>
    <h3 align="center">Transaction Manager</h3>
    <div class="container mt -5">
        <div class="row gy-5" style="display: block;">
            <div class="col">
                <form action="{{ route('create_transaction') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <br>
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type">
                        @error('type')
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
                        <label for="balance" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount">
                        @error('amount')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="entry_date" class="form-label">Entry Date</label>
                        <input type="date" class="form-control" id="entry_date" name="entry_date">
                        @error('entry_date')
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
                <h3 align="center">Transaction Details</h3>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="cols">Type</th>
                            <th scope="cols">Category</th>
                            <th scope="cols">Amount</th>
                            <th scope="cols">Entry Date</th>
                            <th scope="cols">Action</th>
                    </thead>
                    <tbody>
                        <section>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->category }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->entry_date }}</td>
                                    <td>
                                        <a href="{{ url('edit_transaction', $transaction->id) }}"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ url('delete_transaction', $transaction->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>

                                    </td>
                                </tr>
                            @endforeach


                        </section>
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
