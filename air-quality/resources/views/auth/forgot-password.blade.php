@extends('template')

@section('title', 'Forget password')

@section('content')

    <x-guest-layout>
        <x-auth-card>
            <div class="login-container text-center">
                <div class="form-signin">

                    <h3 class="h3 mb-3 fw-normal">Forgot your password?</h3>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-5 h-3" />
                        </a>
                    </x-slot>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <x-input id="email" class="form-control" id="floatingInput" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-label for="floatingInput" :value="__('Email')" />
                        </div>

                        <!-- Validation Errors -->
                        <div class="mb-3">
                            <x-auth-validation-errors class="mb-3" :errors="$errors" />
                        </div>

                        <!-- Reset Password -->
                        <div class="form-floating mb-3">
                            <x-button class="btn btn-md btn-info">
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>

                    </form>


        </x-auth-card>
    </x-guest-layout>

@endsection
