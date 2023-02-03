@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ url('process_invites') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <select class="form-control" name="account_name" id="account_name">
                                    <option>Account Name</option>
                                    @foreach ($user as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-info">Send Invitation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
