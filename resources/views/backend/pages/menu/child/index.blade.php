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
                        @include('backend.pages.menu.tabs', ['activeTab' => 'child'])
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
                                            <div id="menu-label-accordion-collapse-body-{{$menu_label->id}}" class="hidden p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900"
                                                aria-labelledby="menu-label-accordion-collapse-heading-{{$menu_label->id}}">
                                                    {{-- Parent Accordion --}}
                                                    @if (count($menu_label->menus))
                                                        <div id="menu-label-accordion-collapse-{{$menu_label->id}}" data-accordion="collapse">
                                                            @foreach ($menu_label->menus as $menu)
                                                                <div class="menu-label-parent-accordion-row">
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
                                                                    <div id="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}" class="hidden p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900"
                                                                        aria-labelledby="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}">
                                                                            {{-- Child Accordion --}}
                                                                            <div id="menu-label-accordion-collapse-{{$menu_label->id}}-{{$menu->id}}" data-accordion="collapse">
                                                                                    @if (count($menu->child))
                                                                                            @foreach ($menu->child as $child)
                                                                                                @include('backend.pages.menu.child.partials.accordion', [
                                                                                                    'duplicate' => '',
                                                                                                    'form_action' => route('admin.menu.update', $child->id),
                                                                                                    'form_class' => 'updateMenuForm',
                                                                                                    'child' => $child,
                                                                                                    'menu_label_id' => $menu_label->id,
                                                                                                    'parent_id' => $menu->id
                                                                                                ])
                                                                                            @endforeach
                                                                                    @else
                                                                                        @include('backend.pages.menu.child.partials.accordion', [
                                                                                            'duplicate' => '',
                                                                                            'form_action' => route('admin.menu.store'),
                                                                                            'form_class' => 'storeMenuForm',
                                                                                            'child' => NULL,
                                                                                            'menu_label_id' => $menu_label->id,
                                                                                            'parent_id' => $menu->id
                                                                                        ])
                                                                                    @endif
                                                                            </div>
                                                                            {{-- Child Accordion --}}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    {{-- Parent Accordion --}}
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
        $(document).on('click', '.updateMenuForm .remove', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.closest('.updateMenuForm').find('.form-loaded');


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
                    type: 'post',
                    url: '{{route("admin.menu.delete")}}',
                    data: {
                    '_token' : '{{csrf_token()}}',
                    'id': _this.attr('data-id')
                },
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    _this.closest('.menu-label-parent-child-accordion-row').remove();
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
        $(document).on('click', '.updateMenuForm .clone', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.closest('.updateMenuForm').find('.form-loaded');

            $.ajax({
                type: 'post',
                url: '{{route("admin.menu.clone")}}',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'id': _this.attr('data-id'),
                    'type' : 'child',
                },
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    Toast.fire({icon: 'success', text: response.message});
                    $('#menu-label-accordion-collapse-'+_this.attr('data-label')+'-'+_this.attr('data-parent')).append(response.html);
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    initAccordions();
                },
                error: function(xhr) {
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    var responseText = $.parseJSON(xhr.responseText);
                    Toast.fire({icon: 'error', text: responseText.message});
                }
            });
        
        })
        $(document).on('submit', '.updateMenuForm', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.find('.form-loaded');
            $.ajax({
                type: _this.attr('method'),
                url: _this.attr('action'),
                data: _this.serialize(),
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    Toast.fire({icon: 'success', text: response.message});
                },
                error: function(xhr) {
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    var responseText = $.parseJSON(xhr.responseText);
                    Toast.fire({icon: 'error', text: responseText.message});
                }
            });
        })
        $(document).on('submit', '.storeMenuForm', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.find('.form-loaded');
            $.ajax({
                type: _this.attr('method'),
                url: _this.attr('action'),
                data: _this.serialize(),
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    Toast.fire({icon: 'success', text: response.message});
                },
                error: function(xhr) {
                    formLoaded.removeClass('hidden flex').addClass('hidden');
                    var responseText = $.parseJSON(xhr.responseText);
                    Toast.fire({icon: 'error', text: responseText.message});
                }
            });
        })
    </script>
@endpush
