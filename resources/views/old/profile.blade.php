{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="col">
        <h3 align="center">Account Details</h3>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="cols">ID</th>
                    <th scope="cols">Name</th>
                    <th scope="cols">Email</th>
                    <th scope="cols">Action</th>
            </thead>
            <tbody>

                <tr>
                    <th>{{ auth()->user()->id }}</th>
                    <td>{{ auth()->user()->name }}</td>
                    <td>{{ auth()->user()->email }}</td>

                    <td>
                        {{-- <a href="{{ url('editAccount', $acc->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ url('deleteAccount', $acc->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
{{-- </td>
</tr>

</tbody>
</table>
</body>

</html>  --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"></script>
{{-- <div class="container rounded bg-white mt-5 mb-5">
    <div class="row-cols-mt-2">
        <div class="col-md-4  border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                </span>
            </div>
        </div>
        <div class="col-md-5 mt-3 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">

                </div>
            </div>

        </div>
    </div>
</div>
</div> --}}


<div class="card" style="width: 50rem; text-align:center">
    <img class="rounded-circle mt-5 mr-3" width="150px"
        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
    <span class="font-weight-bold"></span><span class="text-black-50">
        <h4>User Profile</h4>
    </span><span>
        <div class="card-body">
            <h4 class="text-center">Profile Settings</h4>
        </div>
        <div class="row mt-4">
            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control"
                    placeholder="first name" value="{{ auth()->user()->name }}"></div>
            <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control"
                    value="{{ auth()->user()->email }}" placeholder="surname"></div>
        </div>
        <br>
        <div class="mt-5 text-center"><a href="{{ url('editProfile', auth()->user()->id) }}"
                class="btn btn-info btn-sm">Edit
                Profile</a>
            <a href="{{ url('destroyProfile', auth()->user()->id) }}" class="btn btn-danger btn-sm">Delete
                Profile</a>

            {{-- </button> --}}
        </div>
</div>
</div>
