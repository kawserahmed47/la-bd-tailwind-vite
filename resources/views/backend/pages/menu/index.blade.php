@extends('backend.master', ['title' => 'Menu List', 'page' => 'menu'])

@push('css')
    <style>
        /* Custom styles for the active and hidden tabs */
        .tab-btn.active-tab {
            background-color: #4b5563;
            color: #ffffff;
        }

        .tab-content.hidden-content {
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Menu List',
        
            'breadcrumb_title' => 'Menu',
            'breadcrumb_title_url' => route('admin.menu.index'),
        
            'breadcrumb_subtitle' => 'List',
            'breadcrumb_subtitle_url' => route('admin.menu.index'),
        ])

        <div class="flex flex-col gap-10">

            <div
                class="rounded-sm border border-stroke bg-white px-3  pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-5.5 xl:pb-1">


                <div class="flex flex-row">
                    <!-- Vertical Tab Menu -->
                    <div class="w-1/4">
                        <ul class="flex flex-col p-4">
                            <li class="p-2 cursor-pointer tab-btn active-tab" data-tab="tab1">Menu Labels</li>
                            <li class="p-2 cursor-pointer tab-btn" data-tab="tab2">Parent Menus</li>
                            <li class="p-2 cursor-pointer tab-btn" data-tab="tab3">Child Menus
                            </li>
                            <!-- Add more tabs as needed -->
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="w-3/4 p-4">
                        <div class="tab-content active-content" data-content="tab1">
                            <!-- Content for Tab 1 -->


                            <div
                                class="w-full pb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <ul
                                    class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                    <li class="mr-2">
                                        <p
                                            class="inline-block p-4 rounded-tl-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                            Menu Labels</p>
                                    </li>

                                    <li class="mr-2 ">
                                        <button type="button"
                                            class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                           Add More Label</button>
                                    </li>

                                </ul>
                                <div id="defaultTabContent" class="p-5" >
                                    <div id="accordion-collapse"  data-accordion="collapse">
                                        <div class="accordion-row">
                                            <h2 id="accordion-collapse-heading-1">
                                                <button type="button"
                                                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200  focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                                    aria-controls="accordion-collapse-body-1">
                                                    <span>Main</span>
                                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                    </svg>
                                                </button>
                                            </h2>
                                            <div id="accordion-collapse-body-1" class="hidden"
                                                aria-labelledby="accordion-collapse-heading-1">
                                                <div
                                                    class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                    <form>
                                                        <div class="mb-6">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                            <input type="text" id="name" name="name"
                                                                value="Main"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                        </div>
                                                        <div class="mb-6">
                                                            <label for="bn_name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                                                in Bengali</label>
                                                            <input type="text" id="bn_name" name="bn_name"
                                                                value="মেইন"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                        </div>
                                                        <div class="mb-6">
                                                            <label for="slug"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                                                                endpoint</label>
                                                            <input type="text" id="slug" name="slug"
                                                                value="main"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                        </div>
                                                        <div class="flex items-start mb-6">
                                                            <div class="flex items-center h-5">
                                                                <input id="remember" type="checkbox" checked value=""
                                                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                                                    required>
                                                            </div>
                                                            <label for="remember"
                                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                                                        </div>
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                                        <button type="button"
                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Remove</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-row">
                                            <h2 id="accordion-collapse-heading-2">
                                                <button type="button"
                                                    class="flex items-center justify-between  w-full p-5 font-medium text-left text-gray-500 border  border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-2">
                                                    <span>Others</span>
                                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                    </svg>
                                                </button>
                                            </h2>
                                            <div id="accordion-collapse-body-2" class="hidden"
                                                aria-labelledby="accordion-collapse-heading-2">
                                                <div class="p-5 border border-gray-200 dark:border-gray-700">
                                                    <form>
                                                        <div class="mb-6">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                            <input type="text" id="name" name="name"
                                                                value="Others"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                        </div>
                                                        <div class="mb-6">
                                                            <label for="bn_name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                                                in Bengali</label>
                                                            <input type="text" id="bn_name" name="bn_name"
                                                                value="অন্যান্য"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                        </div>
                                                        <div class="mb-6">
                                                            <label for="slug"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                                                                endpoint</label>
                                                            <input type="text" id="slug" name="slug"
                                                                value="others"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                        </div>
                                                        <div class="flex items-start mb-6">
                                                            <div class="flex items-center h-5">
                                                                <input id="remember" type="checkbox" checked value=""
                                                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                                                    required>
                                                            </div>
                                                            <label for="remember"
                                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                                                        </div>
                                                        <button type="submit"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                                        <button type="button"
                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Remove</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                       




                                    </div>
                                </div>
                            </div>






                        </div>
                        <div class="tab-content hidden-content" data-content="tab2">



                        </div>
                        <div class="tab-content hidden-content" data-content="tab3">
                            <!-- Content for Tab 3 -->


                        </div>
                        <!-- Add more content sections corresponding to the tabs -->
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

    <script type="module">
        $(document).on('submit', '.menu-delete-form', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.closest('.menu-table-section').find('.form-loaded');


            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    type: _this.attr('method'),
                    url: _this.attr('action'),
                    data: _this.serialize(),
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    _this.closest('tr').remove();
                    Toast.fire({icon: 'success', text: response.message});
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                },
                error: function(xhr) {
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    var responseText = $.parseJSON(xhr.responseText);
                    Toast.fire({icon: 'error', text: responseText.message});
                }
            });

                
            }
            })

        
        })
        document.addEventListener('alpine:init', () => {
            Alpine.data('activeTab', 'tab1');
        });

         // JavaScript to handle tab switching
  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");

  function showTab(tabIndex) {
    tabContents.forEach((content) => content.classList.add("hidden-content"));
    tabButtons.forEach((button) => button.classList.remove("active-tab"));

    tabContents[tabIndex].classList.remove("hidden-content");
    tabButtons[tabIndex].classList.add("active-tab");
  }

  tabButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      showTab(index);
    });
  });
        
    </script>
@endpush
