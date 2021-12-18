{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> --}}
{{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div> --}}
<div class="min-h-screen d-flex justify-content-center align-items-start flex-wrap pt-6 pt-sm-0 bg-gray-400">
    <div>
        {{ $logo }}
    </div>

    <div class="mt-6 px-6 py-4bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
