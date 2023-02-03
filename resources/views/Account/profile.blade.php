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

    <section class="content mt-5">

        <div class="container-fluid">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ Auth::user()->name }}
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">User Name</label>
                            <input type="text" id="inputName" class="form-control"
                                placeholder=" {{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Email</label>
                            <input type="text" id="inputDescription" class="form-control"
                                placeholder=" {{ Auth::user()->email }}">
                        </div>
                        {{-- <div class="form-group">
                        <label for="amount">Balance</label>
                        <input type="text" id="amount" name="amount" class="form-control"
                            placeholder="  {{ auth()->user()->accounts()->sum('balance') }}">
                    </div> --}}
                    </div>

                </div>

            </div>
        </div>

    </section>

</body>

</html>
