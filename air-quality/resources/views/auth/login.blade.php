{{-- @extends('template')

@section('title', 'Login page')

@section('content') --}}

{{-- <div class="container">
        <div class="row"> --}}
{{-- <x-application-logo class="w-5 h-3" /> --}}

<x-guest-layout>
    <x-auth-card>


        <x-slot name="logo" class="py-9 pt-lg-20">
            <a href="/">
                <x-application-logo class="h-40px" />
            </a>
            <h3 class="fw-bolder text-info fs-2qx pb-5 pb-md-10">See the Air Quality next to your location</h3>
            <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
        </x-slot>


        {{-- <div class="login-container text-center col-6"> --}}
        {{-- <div class="form-signin"> --}}


        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf

            <h3 class="h3 mb-3 fw-normal">Please sign in</h3>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <!-- Email Address -->
            <div class="form-floating mb-3">
                <x-input id="email" class="form-control" id="floatingInput" type="email" name="email"
                    :value="old('email')" required autofocus />
                <x-label for="floatingInput" :value="__('Email')" />
                <div class="invalid-feedback">
                    Email is required.
                </div>
            </div>


            <!-- Password -->
            <div class="form-floating mb-3">
                <x-input class="form-control" id="floatingPassword" type="password" name="password" required
                    autocomplete="current-password" />
                <x-label for="floatingInput" :value="__('Password')" />
                <div class="invalid-feedback">
                    Password is required.
                </div>
            </div>

            <!-- Remember Me -->
            <div class="checkbox mb-3">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Forget password -->
            <div class="flex  row justify-content-center mb-4">

                <x-button class="w-50 fw-normal">
                    {{ __('Log in') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>

            <div class="d-flex flex-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                <a href="https://keenthemes.com/support" class="text-muted text-hover-primary px-2"
                    target="_blank">Support</a>
                <a href="https://themes.getbootstrap.com/product/good-bootstrap-5-admin-dashboard-template"
                    class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
            </div>
        </form>





    </x-auth-card>
</x-guest-layout>

{{-- @endsection --}}


{{-- old VERSION --}}
<!-- Email-->
{{-- <div class="mt-4">
 <x-label for="email"  :value="__('Email')" /> 
 <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
 required autofocus /> 


  <!-- Password -->
  <div class="mt-4">
 <x-label for="password" :value="__('Password')" />
   <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
     autocomplete="current-password" /> --}}
