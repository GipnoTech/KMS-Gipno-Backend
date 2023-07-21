@extends('platform::app')

@section('body')


        <header class="p-0 m-0 bg-white text-black text-center align-items-center" style="height: 75px">
            <div class="container" style="margin-left: 35px !important;">
                <div class="rows d-flex flex-row mt-2">
{{--                    <div class="col-md-2 position-fixed h-100 align-items-start ">--}}
                        <svg width="138" height="48" viewBox="0 0 138 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M35.4511 4.2063V0.000244141H40.258V4.2063H35.4511Z" fill="url(#paint0_linear_456_13502)"/>
                            <path d="M35.4511 28.2409V6.0089H39.6571V28.2409C39.6571 30.6444 39.0563 33.6487 37.5541 34.55C36.3524 35.2711 35.6514 30.6444 35.4511 28.2409Z" fill="url(#paint1_linear_456_13502)"/>
                            <path d="M30.3437 38.7561C30.3437 45.7261 29.142 47.2683 28.5411 47.1682C27.3394 47.1682 26.0375 43.3627 25.5368 41.46V11.7171L24.6355 10.8158H6.00866V28.2409H17.4251V24.6357H14.4208V19.2279H23.1333V34.55H4.80692C2.40346 34.55 0.600866 30.7445 0 28.8418V10.215C0 6.36942 3.20462 5.40804 4.80692 5.40804H25.5368C29.142 5.40804 30.2436 8.61265 30.3437 10.215V38.7561Z" fill="url(#paint2_linear_456_13502)"/>
                            <path d="M132.491 5.40804H110.86C108.216 5.40804 106.153 9.81438 105.452 12.0176V30.9448C105.452 33.829 109.057 35.5515 110.86 36.0522H132.491C137.057 36.0522 137.799 32.2467 137.598 30.344V12.0176C137.598 9.85444 134.193 6.70991 132.491 5.40804Z" fill="url(#paint3_linear_456_13502)"/>
                            <path d="M80.2156 28.2409V7.8115C80.2156 6.81595 81.0226 6.0089 82.0182 6.0089H99.7437C100.407 6.0089 100.945 6.54693 100.945 7.21063V28.2409C100.945 30.6444 100.345 33.6487 98.8424 34.55C97.6407 35.2711 96.9397 30.6444 96.7394 28.2409V14.421C96.7394 12.4299 95.1253 10.8158 93.1342 10.8158H88.0268C86.0357 10.8158 84.4216 12.4296 84.4216 14.4207V28.2409C84.4216 30.6444 83.8208 33.6487 82.3186 34.55C81.1169 35.2711 80.4158 30.6444 80.2156 28.2409Z" fill="url(#paint4_linear_456_13502)"/>
                            <path d="M44.4641 38.7561C44.4641 45.7261 45.6658 47.2683 46.2667 47.1682C47.4684 47.1682 48.7703 43.3627 49.271 41.46V11.7171L50.1723 10.8158H68.7991V28.2409H57.3827H51.6744V34.55H70.0008C72.4043 34.55 74.2069 30.7445 74.8078 28.8418V10.215C74.8078 6.36942 71.6032 5.40804 70.0008 5.40804H49.271C45.6658 5.40804 44.5642 8.61265 44.4641 10.215V38.7561Z" fill="url(#paint5_linear_456_13502)"/>
                            <path d="M111.189 12.0986C111.173 11.0719 112.017 10.2397 113.043 10.2694L128.389 10.7142C130.339 10.7707 131.89 12.3675 131.89 14.3179V29.7441C131.89 31.1828 130.635 32.2992 129.206 32.1311L115.642 30.5353C113.248 30.2537 111.433 28.2436 111.397 25.8341L111.189 12.0986Z" fill="white"/>
                            <defs>
                                <linearGradient id="paint0_linear_456_13502" x1="1.05189e-05" y1="-61.3239" x2="163.208" y2="50.8307" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.111114" stop-color="#952EF1"/>
                                    <stop offset="1" stop-color="#17C4E7"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_456_13502" x1="1.05189e-05" y1="-61.3239" x2="163.208" y2="50.8307" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.111114" stop-color="#952EF1"/>
                                    <stop offset="1" stop-color="#17C4E7"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_456_13502" x1="1.05189e-05" y1="-61.3239" x2="163.208" y2="50.8307" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.111114" stop-color="#952EF1"/>
                                    <stop offset="1" stop-color="#17C4E7"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_456_13502" x1="1.05189e-05" y1="-61.3239" x2="163.208" y2="50.8307" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.111114" stop-color="#952EF1"/>
                                    <stop offset="1" stop-color="#17C4E7"/>
                                </linearGradient>
                                <linearGradient id="paint4_linear_456_13502" x1="1.05189e-05" y1="-61.3239" x2="163.208" y2="50.8307" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.111114" stop-color="#952EF1"/>
                                    <stop offset="1" stop-color="#17C4E7"/>
                                </linearGradient>
                                <linearGradient id="paint5_linear_456_13502" x1="1.05189e-05" y1="-61.3239" x2="163.208" y2="50.8307" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.111114" stop-color="#952EF1"/>
                                    <stop offset="1" stop-color="#17C4E7"/>
                                </linearGradient>
                            </defs>
                        </svg>


{{--                    </div>--}}
                </div>

            </div>
        </header>

    <div class="p-0 h-100" style="margin-left: 7em !important;">
        <div class="p-0 mb-4 mb-md-0 d-flex ml-2 flex-column h-100" style="padding-left: 0 !important;">
            @yield('workspace')

            @include('platform::footer')
        </div>
    </div>

@endsection
