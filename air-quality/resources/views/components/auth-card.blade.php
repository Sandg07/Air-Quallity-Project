<div class="bg-gray-400">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid flex-row-fluid justify-content-center">

            {{-- aside --}}
            {{-- <div class="d-flex flex-column bg-success justify-content-center align-items-center"> --}}
            <div class="d-flex flex-column bg-success justify-content-center align-items-lg-center w-100 h-lg-100">
                <div class="d-flex flex-row-fluid flex-column text-center p-3 pt-lg-20 w-lg-800" style="width:100%">
                    {{ $logo }}
                </div>

            </div>


            {{-- body form --}}
            <div class="d-flex flex-column p-10 col-lg-6">
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    {{-- <div class="w-lg-500px p-10 p-lg-15 mx-auto"> --}}

                    {{ $slot }}


                </div>
            </div>
        </div>
    </div>
</div>
{{-- version1 --}}
{{-- <div class="min-h-screen d-flex flex-column  justify-content-sm-center align-items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div> --}}




{{-- old --}}
{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div> --}}
