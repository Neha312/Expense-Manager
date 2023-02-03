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
</head>

<body>
    @extends('layouts.app')
    <br>

    @section('content')
        <center>


            <div class="card mt-4">
                <div class="card-body">
                    <h1 style="text-align:center" class="text-info">Welcome {{ Auth::user()->name }}</h1>
                </div>
            </div>
            <div class="card mt-4 m-sm-5" style="width: 60rem;  height:15rem">
                <div class="card-body">
                    <h1 class="card-title">User Profile</h1>
                    <a href="{{ url('profile') }}" class="btn btn-info btn-sm">User Profile</a>

                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            <div class="card mt-4 m-sm-5" style="width: 60rem;  height:15rem">
                <div class="card-body">
                    <h1 class="card-title">View Transactions</h1>
                    <a href="{{ url('total_transaction') }}" class="btn btn-info btn-sm">View Transaction</a>

                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            <div class="card mt-4 m-sm-5" style="width: 60rem;  height:15rem">
                <div class="card-body">
                    <h1 class="card-title">Total Balance</h1>
                    <a href="{{ url('total_balance') }}" class="btn btn-info btn-sm">Total Balanace</a>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
        </center>
    @endsection
</body>

</html>
