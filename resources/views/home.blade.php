@extends('layouts.app')
<br>
@section('content')
    {{-- @include('account') --}}
    {{-- @include('loggedUser') --}}
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                @include('profile')
            </div>
        </div>
        <br>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <button class="btn
        btn-warning"><a href="{{ url('account') }}">Account Manager </a></button><br>
                <button class="btn btn-warning"><a href="{{ url('expense') }}">Expense Manager </a></button>
            </div>
        </div>
    </div>
@endsection
