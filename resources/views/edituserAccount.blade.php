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
    <form action="{{ route('updateuserAccount', $accounts->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="bank_name" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name"
                value="{{ $accounts->bank_name }}">
            @error('bank_name')
                <br> <span class="text-warning">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account_no" class="form-label">Account No</label>
            <input type="number" class="form-control" id="account_no" name="account_no"
                value="{{ $accounts->account_no }}">
            @error('account_no')
                <br> <span class="text-warning">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="iafc_code" class="form-label">IAFC Code</label>
            <input type="text" class="form-control" id="iafc_code" name="iafc_code"
                value="{{ $accounts->iafc_code }}">
            @error('iafc_code')
                <br> <span class="text-warning">{{ $message }}</span>
            @enderror
        </div>
        <div class="button text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
