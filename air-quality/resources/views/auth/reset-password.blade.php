@extends('template')

@section('title', 'Reset password')

@section('content')

    <x-guest-layout>
        <x-auth-card>
            <div class="login-container text-center">
                <div class="form-signin ">

                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-5 h-6" />
                        </a>
                    </x-slot>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <x-input id="email" class="form-control" id="floatingInput" type="email" name="email"
                                :value="old('email', $request->email)" required autofocus />
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

                        <!-- Confirm Password -->
                        <div class="form-floating mb-1">
                            <x-input id="password_confirmation" class="form-control w-full" type="password"
                                name="password_confirmation" required />
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <div class="invalid-feedback">
                                Confirm password.
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-2">
                            <x-button>
                                {{ __('Reset Password') }}
                            </x-button>
                        </div>
                    </form>
        </x-auth-card>
    </x-guest-layout>

@endsection


{{-- old version --}}

{{-- <div>
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
        :value="old('email', $request->email)" required autofocus />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
        name="password_confirmation" required />
</div> --}}
