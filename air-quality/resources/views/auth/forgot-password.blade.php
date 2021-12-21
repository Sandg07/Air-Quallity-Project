@extends('template')

@section('title', 'Register page')

@section('content')

    <x-guest-layout>
        <x-auth-card>

            <div class="form-signin  text-center">

                <x-slot name="logo">
                    <a href="/">
                        <img src="/assets/logo/letzbreathe_logo_woman.png" class="d-bloc img-fluid mb-4" width="200"
                            height="200" loading="lazy" alt="logo letz breathe">
                    </a>
                    <h3 class="fw-bolder text-info pb-3 pt-lg-20">See the Air Quality next to your location</h3>
                    <p class="text-dark pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit consectetur adipisicing
                        elit consectetur adipisicing elit..</p>
                </x-slot>


                <div class="form-container-login justify-content-sm-center">

                    <h3 class="h4 m-3 fw-normal">Forgot your password?</h3>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

        </x-auth-card>
    </x-guest-layout>
@endsection
