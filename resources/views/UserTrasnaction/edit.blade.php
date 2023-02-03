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
    @include('layouts.navigation')
</head>

<body>
    <div class="container mt -5">
        <div class="row gy-5" style="display: block;">
            <div class="col">
                <h3 align="center">Edit Account</h3>
                <form action="{{ url('update_transaction', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <br>
                        <label for="account_name" class="form-label"> Account Name</label>
                        <input type="text" class="form-control" id="account_name" name="account_name"
                            value="{{ $transaction->account_id }}">
                        @error('account_name')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror

                        @error('account_name')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category"
                            value="{{ $transaction->category }}">
                        @error('category')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type"
                            value="{{ $transaction->type }}">
                        @error('type')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="balance" name="balance"
                            value="{{ $transaction->amount }}">
                        @error('amount')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="entry_date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="entry_date" name="entry_date"
                            value="{{ $transaction->entry_date }}">
                        @error('entry_date')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="button text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <br>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                </script>
            </div>
        </div>
    </div>

</body>

</html>
