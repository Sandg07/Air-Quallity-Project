@extends('template')

@section('title', 'Confirm password')

@section('content')

    <x-guest-layout>
        <x-auth-card>
            <div class="login-container text-center">
                <div class="form-signin">

                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-5 h-3" />
                        </a>
                    </x-slot>

                    <div class="mb-2 text-sm text-gray-600">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-2" :errors="$errors" />

                    <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Password -->
                        <div>
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                            <div class="invalid-feedback">
                                Password is required.
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-button>
                                {{ __('Confirm') }}
                            </x-button>
                        </div>
                    </form>
        </x-auth-card>
    </x-guest-layout>

@endsection
