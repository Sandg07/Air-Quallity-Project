@extends('template')

@section('title', 'Login page')


@section('content')

    <x-guest-layout>
        <x-auth-card>
            <div class="form-signin  text-center">


                <x-slot name="logo">
                    <a href="/">
                        <img src="{{ URL::to('/assets/logo_letzbreathe.svg') }}" class="d-bloc img-fluid mb-4" width="200"
                            height="200" loading="lazy" alt="...">
                    </a>
                    <h3 class="fw-bolder text-info pb-3 pt-lg-20">See the Air Quality next to your location</h3>
                    <p class="text-dark pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit consectetur adipisicing
                        elit consectetur adipisicing elit..</p>
                </x-slot>


                <div class="form-container-login justify-content-sm-center">

                    <h3 class="h4 m-3 fw-normal">Please sign in</h3>
                    <br>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            {{-- <x-label for="email" :value="__('Email')" /> --}}
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                placeholder="Your email" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            {{-- <x-label for="password" :value="__('Password')" /> --}}
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" placeholder="Your password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <!-- Button + redirection -->
                        <div class="d-flex flex-column justify-content-end align-items-center mt-4">

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:bg-info mb-4"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <a class="underline text-sm text-gray-600 hover:bg-info mb-4"
                                href="{{ url('/register') }}">Not registered? Do it now!</a>

                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>

                    <br>
                    <br>
                </div>


            </div>


        @section('script')
            {{-- Bootstrap script js --}}
            <script src="/js/app.js" type="text/javascript"></script>
        @endsection()
    </x-auth-card>

</x-guest-layout>

@endsection
