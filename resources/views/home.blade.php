@extends('layouts.app')
<br>

@section('content')
    <h1 style="text-align: center">{{ Auth::user()->name }}</h1>
@endsection
