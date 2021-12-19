@extends('templateDashboard')

@section('title', 'Dashboard Air Quality')

@section('content')

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>


        {{-- BARCHART SECTION --}}
        <div class="wrapper d-flex flex-column flex-row-fluid border rounded bg-light-600">
            <div class="content d-flex flex-column flex-column-fluid">
                <div class="col-xxl-8 mb-5 mb-xxl-10">
                    <div class="barchart-section">
                        <h2>Barchart section</h2>

                        <div id="map"></div>

                    </div>
                </div>
            </div>
        </div>

        {{-- FAVORITE + MAP SECTION --}}
        <div class="wrapper d-flex flex-column flex-row-fluid border rounded bg-light-600">
            <div class="content d-flex flex-column flex-column-fluid">
                <div class="col-xxl-8 mb-5 mb-xxl-10">
                    <div class="barchart-section">
                        <h2>Favorite Map section</h2>


                    </div>
                </div>
            </div>
        </div>



    </x-app-layout>
@endsection
