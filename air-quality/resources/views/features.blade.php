<!-- Section with four info areas left & one card right with image and waves -->
<section class="py-6 p-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="row justify-content-start">

                    {{-- feature 1 --}}
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="orange"
                                    class="bi bi-person-workspace" viewBox="0 0 20 18">
                                    <path
                                        d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path
                                        d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                                </svg>
                            </div>
                            <h5>User dashboard</h5>
                            <p>All-in-one solution to gather air quality around you and access daily updates in selected
                                locations in Luxembourg.</p>
                        </div>
                    </div>
                    {{-- feature 2 --}}
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="blue"
                                    class="bi bi-bar-chart-fill" viewBox="0 0 20 18">
                                    <path
                                        d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                                </svg>

                            </div>
                            <h5>Barchart</h5>
                            <p>Some text about air quality in different stations of Luxembourg.</p>
                        </div>
                    </div>
                </div>
                {{-- feature 3 --}}
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="green"
                                    class="bi bi-map-fill" viewBox="0 0 20 18">
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z" />
                                </svg>
                            </div>
                            <h5>Air quality around you</h5>
                            <p>Have a look at the air quality in Luxembourg. text about PM10 03 N02 PM25; AQI is updated
                                each day according to Luxembourg API (name of api). </p>
                        </div>
                    </div>

                    {{-- feature 4 --}}
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="red"
                                    class="bi bi-star-fill" viewBox="0 0 20 18">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <h5>Save your locations</h5>
                            <p>Save your location in your favorites and access them when logging in. </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- map feature section --}}
            <div class="col-lg-4 ms-auto">
                <div class="card shadow">
                    {{-- picture --}}
                    <img class="card-img-top" src="/assets/OpenStreetMap-1.jpg">
                    {{-- Design --}}
                    <div class="position-relative overflow-hidden" style="height:50px;margin-top:-50px;">
                        <div class="position-absolute w-100 top-0 z-index-1">
                            <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40"
                                preserveAspectRatio="none" shape-rendering="auto">
                                <defs>
                                    <path id="card-wave"
                                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                                    </path>
                                </defs>
                                <g class="moving-waves">
                                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                                </g>
                            </svg>
                        </div>
                    </div>
                    {{-- card info --}}
                    <div class="card-body">
                        <h4>
                            Use of OpenStreetMap
                        </h4>
                        <p>
                            About OpenStreetMap : using API fetch AQI in Luxembourg, on click/searchbox grad this
                            location - rename it and save in your favorites. Quick access to your location and see the
                            updated AQI for this selected place.
                        </p>
                        <button class="logBtn btn btn-outline-secondary btn-lg px-4" style="text-decoration: none"
                            target="_blank">
                            <a href="/login" class="text-info icon-move-right">Log in here
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </a>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Section with four info areas left & one card right with image and waves -->




{{-- <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="150" fill="currentColor"
                class="bi bi-geo-alt-fill card-img-top" viewBox="0 0 20 20">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="150" fill="currentColor"
                class="bi bi-geo-alt-fill card-img-top" viewBox="0 0 20 20">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a short card.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="150" fill="currentColor"
                class="bi bi-geo-alt-fill card-img-top" viewBox="0 0 20 20">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="150" fill="currentColor"
                class="bi bi-geo-alt-fill card-img-top" viewBox="0 0 20 20">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
</div> --}}
