{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> --}}
{{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div> --}}
{{-- <div class="min-h-screen d-flex justify-content-center align-items-start flex-wrap pt-6 pt-sm-0 bg-gray-400"> --}}


{{-- <div class="auth-bg bg-gray-400">
    <div class="row justify-content-center  flex-wrap "> --}}
<div class="auth-bg bg-gray-400">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid flex-row-fluid justify-content-around">

            {{-- aside --}}
            {{-- <div class="d-flex flex-column flex-lg-row-auto bg-success w-lg-600px positon-lg-relative p-10"> --}}
            <div
                class="d-flex flex-column bg-success position-lg-fixed top-0 bottom-0 w-xl-700px scroll-y  justify-content-center align-items-center">
                <div class="d-flex flex-row-fluid flex-column text-center w-100 p-5 pt-lg-20 h-lg-vh-100">

                    {{ $logo }}
                </div>

            </div>
            {{-- </div> --}}

            {{-- body form --}}
            <div class="d-flex flex-column flex-lg-row-fluid p-10">
                <div class="d-flex flex-column flex-column-fluid  justify-content-center align-items-center">
                    <div class="w-lg-600px p-lg-15 mx-auto vh-100 p-10">

                        {{ $slot }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
