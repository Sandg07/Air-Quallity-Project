@extends('template')

@section('title', 'Verify Email page')

@section('content')



    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <img src="{{ URL::to('/assets/logo_letzbreathe_1.svg') }}" class="d-bloc img-fluid mb-4" width="300"
                        height="200" loading="lazy" alt="...">
                </a>
            </x-slot>

            <div class=" ms-4 mb-4 pb-3 pt-lg-20 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 ms-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 ms-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button>
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline btn btn-primary text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </x-auth-card>
    </x-guest-layout>
@endsection
