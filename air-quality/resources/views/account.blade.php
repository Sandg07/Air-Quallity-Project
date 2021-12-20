@extends('template')

@section('title', 'Account page')
@section('css')
@endsection

@section('content')
    <h2 class="text-center">Account Page</h2>
    <div class="container d-flex">
        <div class="container d-flex flex-column">

            <p><strong>First name: </strong> </p>
            <p><strong>Last name: </strong></p>
            <p><strong>City: </strong></p>
            <p><strong>Email: </strong></p>
        </div>
        <div class="container d-flex flex-column">
            <p>{{ $user->first_name }}</p>
            <p>{{ $user->last_name }}</p>
            <p>{{ $user->city }}</p>
            <p>{{ $user->email }}</p>
        </div>
    </div>
    <div class="container "><a class="btn btn-primary tn-lg px-4 me-md-2" href="">Edit</a><a
            class="btn btn-primary tn-lg px-4 me-md-2 ml-4 ms-2" href="">Delete</a></div>

@endsection
