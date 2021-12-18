@extends('template')

@section('title', 'Homepage Air Quality')

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

        <div>
            {{-- BARCHART SECTION --}}
            <div class="barchart-section">
                <h2>Barchart section</h2>

                <div id="map"></div>

            </div>
            <hr>

            {{-- FAVORITE + MAP SECTION --}}
        </div>

        {{-- test section --}}

        <div class="wrapper d-flex flex-column flex-row-fluid">
            <div class="content d-flex flex-column flex-column-fluid">
                <div class="col-xxl-8 mb-5 mb-xxl-10">
                    <!--begin::Engage widget 2-->
                    <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px h-xl-100 bg-gray-200 border-0"
                        style="background-position: 100% 100%;background-size: 500px auto;background-image:url('/assets/OpenStreetMap-1.jpg')">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column justify-content-center ps-lg-15">
                            <!--begin::Title-->
                            <h3 class="text-gray-800 fs-2qx fw-boldest mb-4 mb-lg-8">Good admin theme
                                <br>is a tool of enthusiasm
                            </h3>
                            <!--end::Title-->
                            <!--begin::Action-->
                            <div class="m-0">
                                <a href="#" class="btn btn-danger fw-bold" data-bs-target="#kt_modal_create_app"
                                    data-bs-toggle="modal">Create App</a>
                            </div>
                            <!--begin::Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 2-->
                </div>
            </div>

        </div>
    </x-app-layout>
@endsection
