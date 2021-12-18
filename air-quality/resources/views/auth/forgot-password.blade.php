@extends('template')

@section('title', 'Forget password')

@section('content')

    <x-guest-layout>
        <x-auth-card>
            <div class="login-container text-center">
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-5 h-3" />
                    </a>
                </x-slot>
                <div class="form-signin">

                    <h3 class="h3 mb-3 fw-normal">Forgot your password?</h3>

                    <div class="mb-2 text-sm text-gray-600">
                        {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}" class="needs-validation row row g-3"
                        novalidate>
                        @csrf
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-2" :status="session('status')" />
                        <!-- Validation Errors -->
                        <div class="mb-2">
                            <x-auth-validation-errors :errors="$errors" />
                        </div>

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <x-input id="email" class="form-control" id="floatingInput" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-label for="floatingInput" :value="__('Email')" />
                            <div class="invalid-feedback">
                                Email is required.
                            </div>
                        </div>


                        <!-- Reset Password -->
                        <div class="form-floating mb-3">
                            <x-button class="btn btn-infobtn-hover:bg-warning">
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </x-auth-card>
    </x-guest-layout>

@endsection
