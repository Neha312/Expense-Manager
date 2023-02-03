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
    <div class="container mt -5">
        <div class="row gy-5" style="display: block;">
            <div class="col">
                <h3 align="center">transaction Details</h3>
                <br>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="cols">Account Name</th>
                            <th scope="cols">Type</th>
                            {{-- <th scope="cols">Amount</th> --}}
                            <th scope="cols">Category</th>
                            <th scope="cols">Amount</th>
                            <th scope="cols">Entry Date</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($accounts as $account)
                            @foreach ($account->transactions as $transaction)
                                <tr>
                                    <td>{{ $account->account_name }}</td>
                                    <td> {{ $transaction->type }} </td>
                                    <td> {{ $transaction->category }} </td>
                                    <td> {{ $transaction->amount }}</td>
                                    <td> {{ $transaction->entry_date }}</td>

                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
