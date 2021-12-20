@extends('template')

@section('title', 'Register page')

@section('content')

    <x-guest-layout>
        <x-auth-card>

            <div class="form-signin  text-center">

                <x-slot name="logo">
                    <a href="/">
                        <img src="{{ URL::to('/assets/logo_letzbreathe_1.svg') }}" class="d-bloc img-fluid mb-4"
                            width="300" height="200" loading="lazy" alt="...">
                    </a>
                    <h3 class="fw-bolder text-info pb-3 pt-lg-20">See the Air Quality next to your location</h3>
                    <p class="text-dark pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit consectetur adipisicing
                        elit consectetur adipisicing elit..</p>
                </x-slot>


                <div class="form-container-login justify-content-sm-center">

                    <h3 class="h4 m-3 fw-normal">Registration form</h3>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            {{-- <x-label for="first_name" :value="__('First name')" /> --}}
                            <x-input id="first_name" class="block mt-2 w-full" type="text" name="first_name"
                                :value="old('first_name')" placeholder="Your first name" required autofocus />
                        </div>
                        <div>
                            {{-- <x-label for="last_name" :value="__('Last name')" /> --}}
                            <x-input id="last_name" class="block mt-2 w-full" type="text" name="last_name"
                                :value="old('last_name')" placeholder="Your last name" required autofocus />
                        </div>
                        <div>
                            {{-- <x-label for="city" :value="__('City')" /> --}}
                            <x-input id="city" class="block mt-2 w-full" type="text" name="city"
                                placeholder='Your city (optional)' :value="old('city')" autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            {{-- <x-label for="email" :value="__('Email')" /> --}}
                            <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')"
                                placeholder="Your email" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            {{-- <x-label for="password" :value="__('Password')" /> --}}
                            <x-input id="password" class="block mt-2 w-full" type="password" name="password"
                                placeholder="Your password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}
                            <x-input id="password_confirmation" class="block mt-2 w-full" type="password"
                                name="password_confirmation" placeholder="Confirm your password" required />
                        </div>

                        <!-- Button + redirection -->
                        <div class="d-flex flex-column justify-content-end align-items-center mt-4">
                            <a class="underline text-sm text-gray-600 hover:bg-info mb-4" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>


        </x-auth-card>
    </x-guest-layout>

@endsection
