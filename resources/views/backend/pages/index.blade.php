@extends('backend.master', ['title' => 'Dashboard', 'page' => 'dashboard'])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">

            <!-- Card Item Start -->
            <div
                class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="mt-4 flex items-end justify-between">
                    <div class="flex items-center gap-1 text-sm font-medium text-meta-3">
                        <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M1 5h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 1 0 0-2H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2Zm18 4h-1.424a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2h10.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Zm0 6H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 0 0 0 2h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            ৪
                        </h4>
                        <span class="text-sm font-medium">প্রকল্প</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div
                class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="mt-4 flex items-end justify-between">
                    <div class="flex items-center gap-1 text-sm font-medium text-meta-3">
                        <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 3.464V1.1m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C17 15.4 17 16 16.462 16H3.538C3 16 3 15.4 3 14.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 10 3.464ZM1.866 8.832a8.458 8.458 0 0 1 2.252-5.714m14.016 5.714a8.458 8.458 0 0 0-2.252-5.714M6.54 16a3.48 3.48 0 0 0 6.92 0H6.54Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            ১২
                        </h4>
                        <span class="text-sm font-medium">নোটিশ</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div
                class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="mt-4 flex items-end justify-between">
                    <div class="flex items-center gap-1 text-sm font-medium text-meta-3">
                        <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1v3m5-3v3m5-3v3M1 7h7m1.506 3.429 2.065 2.065M19 7h-2M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm6 13H6v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L8 16Z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            ৮
                        </h4>
                        <span class="text-sm font-medium">আবেদন</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div
                class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="mt-4 flex items-end justify-between">
                    <div class="flex items-center gap-1 text-sm font-medium text-meta-3">
                        <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            ১১
                        </h4>
                        <span class="text-sm font-medium">নথি</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->


        </div>

        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">

            <!-- ====== Table One Start -->
            <div class="col-span-12 xl:col-span-8">
                @include('backend.partials.table.table-01')
            </div>
            <!-- ====== Table One End -->

            <!-- ====== Chat Card Start -->
            <div
                class="col-span-12 px-2 rounded-sm border border-stroke bg-white py-6 shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
                <h4 class="text-bold text-xl font-weight-bolder">
                    এখন অনলাইনে আছেন
                </h4>

                <div>
                    <a href="messages.html"
                        class="flex items-center gap-5 py-3 px-7.5 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('images') }}/user/user-03.png" alt="User" />
                            <span
                                class="absolute right-0 bottom-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium text-black dark:text-white">
                                    Devid Heilo
                                </h5>
                                <p>
                                    <span class="text-xs">From 12 min</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 py-3 px-7.5 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('images') }}/user/user-04.png" alt="User" />
                            <span
                                class="absolute right-0 bottom-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Henry Fisher</h5>
                                <p>
                                    <span class="text-xs">From 5:54 PM</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 py-3 px-7.5 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('images') }}/user/user-05.png" alt="User" />
                            <span
                                class="absolute right-0 bottom-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-6"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Wilium Smith</h5>
                                <p>
                                    <span class="text-xs">Left 10:12 PM</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 py-3 px-7.5 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('images') }}/user/user-01.png" alt="User" />
                            <span
                                class="absolute right-0 bottom-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium text-black dark:text-white">
                                    Henry Deco
                                </h5>
                                <p>
                                    <span class="text-xs">From 10:12 PM</span>
                                </p>
                            </div>

                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 py-3 px-7.5 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('images') }}/user/user-02.png" alt="User" />
                            <span
                                class="absolute right-0 bottom-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-3"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Jubin Jack</h5>
                                <p>
                                    <span class="text-xs">From 11:00 AM</span>
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="messages.html"
                        class="flex items-center gap-5 py-3 px-7.5 hover:bg-gray-3 dark:hover:bg-meta-4">
                        <div class="relative h-14 w-14 rounded-full">
                            <img src="{{ asset('images') }}/user/user-05.png" alt="User" />
                            <span
                                class="absolute right-0 bottom-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-meta-6"></span>
                        </div>

                        <div class="flex flex-1 items-center justify-between">
                            <div>
                                <h5 class="font-medium">Wilium Smith</h5>
                                <p>
                                    <span class="text-xs">Left Sep 20</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ====== Chat Card End -->
        </div>
    </div>
@endsection

@push('js')
@endpush
