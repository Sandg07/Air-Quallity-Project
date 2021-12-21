@extends('template')
@section('title', 'Account page')
@section('css')
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <p style="color:green">{{ $message }}</p>
    @endif
    @if ($message = Session::get('error'))
        <p style="color:red">{{ $message }}</p>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main class="container-lg flex-column justify-content-around mb-4">
        <h2 class="text-center">Account Page</h2>
        <div class="container d-flex justify-content-center mb-4 ">
            @if (!empty($user->image))
                <img style="border-radius: 50%" height="200px" class="border border-5"
                    src="{{ URL::asset('/uploads/' . $user->image) }}" alt="user-image">
            @else
                <img height="200px" class="border border-5" src="{{ URL::asset('/assets/person-plus-fill.svg') }}"
                    style="border-radius: 50%" alt="">
            @endif
        </div>
        <div class="container d-flex" style="min-width: 390px">
            <div class="container d-flex flex-column col-sm-6">
                <p><strong>First name: </strong> </p>
                <p><strong>Last name: </strong></p>
                <p><strong>City: </strong></p>
                <p><strong>Email: </strong></p>
            </div>
            <div class="container d-flex flex-column">
                <p class="toHide">{{ $user->first_name }}</p>
                <p class="toHide">{{ $user->last_name }}</p>
                @if (empty($user->city))
                    <p class="toHide">No city</p>
                @else
                    <p class="toHide">{{ $user->city }}</p>
                @endif
                <p class="toHide">{{ $user->email }}</p>
            </div>
            <div class="container d-flex flex-column invisible">
                <form enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="container d-flex flex-column">
                        <label for="myFile" class="notShown invisible">Upload your Image</label>
                        <input type="file" name="myFile" id="myFile" class="invisible  notShown">
                    </div>
                    <div class="container ">
                        <input type="text" class="invisible notShown" name="first_name" value="{{ $user->first_name }}">
                        <input type="text" class="invisible notShown" name="last_name" value="{{ $user->last_name }}">
                        <input type="text" class="invisible notShown" name="city" value="{{ $user->city }}">
                        {{-- <input type="text" class="invisible notShown" name="email" value="{{ $user->email }}"> --}}
                        <input type="submit" value="SUBMIT" id="submitBtn" name="submitBtn"
                            class="invisible notShown btn btn-outline-secondary tn-lg px-4 me-md-2 ml-4 ms-2 mt-4">
                    </div>
            </div>
        </div>
        <div class="invisible ms-3 notShown">
        </div>
        <div class="container ">
            <button id="accountFormEdit" class="  btn btn-primary tn-lg px-4 me-md-2">Edit</button>
            <form method="post">
                @csrf

                <input type="text" id="userId" name="userId" value="0" hidden>
                <input type="submit" name="deleteBtn" id="deleteBtn" class="btn btn-primary tn-lg px-4 me-md-2 ml-4 ms-2"
                    value="DELETE">
            </form>
        </div>

    </main>
@endsection
@section('script')
    <script src="/js/account.js"></script>
@endsection
