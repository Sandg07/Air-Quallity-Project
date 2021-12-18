@extends('template')

@section('title', 'Register page')

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

                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}" class="needs-validation row row g-3" novalidate>
                        @csrf

                        <h3 class="h3 mt-3 fw-normal">Registeration form</h3>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-2" :errors="$errors" />

                        <!-- Name -->
                        <div class="form-floating mb-1 col-md-6">
                            <x-input id="first_name" class="form-control w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus />
                            <x-label for="first_name" :value="__('First name')" />
                            <div class="invalid-feedback">
                                First name is required.
                            </div>
                        </div>

                        <div class="form-floating mb-1 col-md-6">
                            <x-input id="last_name" class="form-control w-full" type="text" name="last_name"
                                :value="old('last_name')" required />
                            <x-label for="last_name" :value="__('Last name')" />
                            <div class="invalid-feedback">
                                Last name is required.
                            </div>
                        </div>

                        <!-- City-->
                        <div class="form-floating mb-1">
                            <x-input id="city" class="form-control w-full" type="text" name="city" placeholder='optional'
                                :value="old('city')" />
                            <x-label for="city" :value="__('City')" />
                        </div>

                        <!-- Email Address -->
                        <div class="form-floating mb-1">
                            <x-input id="email" class="form-control w-full" type="email" name="email" :value="old('email')"
                                required />
                            <x-label for="email" :value="__('Email')" />
                            <div class="invalid-feedback">
                                Email is required.
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-1">
                            <x-input id="password" class="form-control w-full" type="password" name="password" required
                                autocomplete="new-password" />
                            <x-label for="password" :value="__('Password')" />
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

                        <div class="flex  row justify-content-center mb-4">

                            <x-button class="w-50 fw-normal" id="registerBtn">
                                {{ __('Register') }}
                            </x-button>

                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </form>

                </div>

            </div>



            </div>
        </x-auth-card>
    </x-guest-layout>

@endsection


{{-- *******---------- OLD VERSION ---------****** --}}
{{-- <!-- Name -->
<div>
                            <x-label for="first_name" :value="__('First name')" />
                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus />
                        </div> 
                        <div>
                            <x-label for="last_name" :value="__('Last name')" />
        
                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                                required autofocus />
                        </div>
                        <div>
                            <x-label for="city" :value="__('City')" />
        
                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" placeholder='optional'
                                :value="old('city')" autofocus />
                        </div>
        
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
        
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                required />
                        </div>
        
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
        
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
        
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
        
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required />
                        </div>
        
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
        
                            <x-button class="ml-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                        </form> --}}
