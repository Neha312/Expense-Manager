<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Form</title>
    {{-- @include('layouts.navigation') --}}
</head>

<body>
    <h3 align="center">Edit Form</h3>
    <div class="container mt-5">
        <div class="row" style="display: block">
            <div class="col">
                <form action="{{ route('updateExpense', $expenses->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $expenses->name }}">
                        @error('name')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $expenses->description }}">
                        @error('description')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="entrydate" class="form-label">Entry Date</label>
                        <input type="date" class="form-control" id="entrydate" name="entrydate"
                            value="{{ $expenses->entrydate }}">
                        @error('entrydate')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount"
                            value="{{ $expenses->amount }}">
                        @error('marks')
                            <br> <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="button text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
