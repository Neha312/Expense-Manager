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
    <center>
        <div class="card mb-3 mt-5" style="width: 400px;">
            <div class="row g-1">
                <div class="col-md-7  bg-info">
                    <h3>Available Balance:</h3>
                </div>
                <div class="col-md-5 bg-gray">
                    <div class="card-body ">
                        <h3>{{ $balance }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
