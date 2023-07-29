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
                        @include('backend.pages.menu.partials.tabs', ['activeTab' => 'child'])
                    </div>

                    <!-- Tab Content -->
                    <div class="w-3/4 p-4">
                        <div class="tab-content active-content">
                            
                            <div id="menu-label-accordion-collapse" data-accordion="collapse">
                                        
                                @if (count($menu_labels))
                                    @foreach ($menu_labels as $menu_label)
                                        <div class="menu-label-accordion-row">
                                            <h2 id="menu-label-accordion-collapse-heading-{{$menu_label->id}}">
                                                <button type="button"
                                                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border  border-gray-200   focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                    data-accordion-target="#menu-label-accordion-collapse-body-{{$menu_label->id}}" aria-expanded="true"
                                                    aria-controls="menu-label-accordion-collapse-body-{{$menu_label->id}}">
                                                    <span>Menu Label: {{$menu_label->name}}</span>
                                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                    </svg>
                                                </button>
                                            </h2>
                                            <div id="menu-label-accordion-collapse-body-{{$menu_label->id}}" class="hidden"
                                                aria-labelledby="menu-label-accordion-collapse-heading-{{$menu_label->id}}">
                                                <div class="p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                
                                                    {{-- Parent Accordion --}}
                                                    @if (count($menu_label->menus))
                                                    <div id="menu-label-accordion-collapse-{{$menu_label->slug}}" data-accordion="collapse">
                                                        @foreach ($menu_label->menus as $menu)
                                                            <div class="menu-label-accordion-row">
                                                                <h2 id="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}">
                                                                    <button type="button"
                                                                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border  border-gray-200   focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                                        data-accordion-target="#menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}" aria-expanded="true"
                                                                        aria-controls="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}">
                                                                        <span>Parent Menu: {{$menu->name}}</span>
                                                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 10 6">
                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                                        </svg>
                                                                    </button>
                                                                </h2>
                                                                <div id="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}" class="hidden"
                                                                    aria-labelledby="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}">
                                                                    <div class="p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                                    


                                                                        
                                                                        {{-- Child Accordion --}}
                                                                        <div id="menu-label-accordion-collapse-{{$menu_label->slug}}-{{$menu->slug}}" data-accordion="collapse">

                                                                        @if (count($menu->child))
                                                                                @foreach ($menu->child as $child)
                                                                                    <div class="menu-label-accordion-row">
                                                                                        <h2 id="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}">
                                                                                            <button type="button"
                                                                                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border  border-gray-200   focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                                                                data-accordion-target="#menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}" aria-expanded="true"
                                                                                                aria-controls="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}">
                                                                                                <span>{{$child->name}}</span>
                                                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                                    viewBox="0 0 10 6">
                                                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                                                                </svg>
                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}" class="hidden"
                                                                                            aria-labelledby="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}">
                                                                                            <div class="p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                                                            
                                                                                                @include('backend.pages.menu.partials.form',
                                                                                                    [
                                                                                                        'form_id' => 'childMenuForm',
                                                                                                        'item' => $child
                                                                                                    ]
                                                                                                )


                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach

                                                                        @else
                                                                            <div class="menu-label-accordion-row">
                                                                                <h2 id="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}-c0">
                                                                                    <button type="button"
                                                                                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border  border-gray-200   focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                                                                        data-accordion-target="#menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c0" aria-expanded="true"
                                                                                        aria-controls="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c0">
                                                                                        <span>New Child</span>
                                                                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                            viewBox="0 0 10 6">
                                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c0" class="hidden"
                                                                                    aria-labelledby="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}-c0">
                                                                                    <div class="p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                                                    
                                                                                        @include('backend.pages.menu.partials.form',
                                                                                            [
                                                                                                'form_id' => 'childMenuForm',
                                                                                                'item' => null
                                                                                            ]
                                                                                        )


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                        {{-- Child Accordion --}}


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    {{-- Parent Accordion --}}

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
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
    </script>
@endpush
