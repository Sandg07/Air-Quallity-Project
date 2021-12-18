{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> --}}
{{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div> --}}
{{-- <div class="min-h-screen d-flex justify-content-center align-items-start flex-wrap pt-6 pt-sm-0 bg-gray-400"> --}}


{{-- <div class="auth-bg bg-gray-400">
    <div class="row justify-content-center  flex-wrap "> --}}
<div class="bg-gray-400">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid flex-row-fluid justify-content-stretch">

            {{-- aside --}}
            <div class="d-flex flex-column bg-success  scroll-y  justify-content-center align-items-center">
                <div class="d-flex flex-row-fluid flex-column text-center w-auto p-3 pt-lg-20 h-lg-vh-100"
                    style="width:100%">
                    {{ $logo }}
                </div>

            </div>


            {{-- body form --}}
            <div class="d-flex flex-center flex-column p-10 col-lg-6">

                <div class=" flex-column-fluid p-lg-15 mx-auto vh-100 p-10 flex-center">

                    {{ $slot }}


                </div>
            </div>
        </div>
    </div>
</div>
