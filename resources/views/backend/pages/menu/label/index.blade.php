@extends('backend.master', ['title' => 'Menu List', 'page' => 'menu'])

@push('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

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

            <div class="rounded-sm border border-stroke bg-white px-3  pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-5.5 xl:pb-1">
                <div class="flex flex-row">
                    <!-- Vertical Tab Menu -->
                    <div class="w-1/4">
                        @include('backend.pages.menu.tabs', ['activeTab' => 'label'])
                    </div>

                    <!-- Tab Content -->
                    <div class="w-3/4 p-4">
                        <div class="tab-content active-content">
                            <!-- Content for Tab 1 -->
                            <div
                                class="w-full pb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <ul
                                    class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                    <li class="mr-2">
                                        <p
                                            class="inline-block p-4 rounded-tl-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                            Menu Types</p>
                                    </li>
                                </ul>
                                <div id="manuLabelTabContent" class="p-5">
                                    <div id="menu-label-accordion-collapse" class="sortable" data-accordion="collapse">
                                        @if (count($menu_labels))
                                            @foreach ($menu_labels as $menu_label)
                                               @include('backend.pages.menu.label.partials.accordion', [
                                                'duplicate' => '',
                                                'form_action' => route('admin.menu-label.update', $menu_label->id),
                                                'form_class' => 'updateMenuLabelForm',
                                                'menu_label' => $menu_label
                                               ])
                                            @endforeach
                                        @else
                                        @include('backend.pages.menu.label.partials.accordion', [
                                            'duplicate' => '',
                                            'form_action' => route('admin.menu-label.store'),
                                            'form_class' => 'storeMenuLabelForm',
                                            'menu_label' => NULL
                                           ])
                                        @endif
                                    </div>
                                </div>
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
        $(document).on('click', '.updateMenuLabelForm .remove', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.closest('.updateMenuLabelForm').find('.form-loaded');


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
                    url: '{{route("admin.menu-label.delete")}}',
                    data: {
                    '_token' : '{{csrf_token()}}',
                    'id': _this.attr('data-id')
                },
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    _this.closest('.menu-label-accordion-row').remove();
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
        $(document).on('click', '.updateMenuLabelForm .clone', function(e){
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.closest('.updateMenuLabelForm').find('.form-loaded');

            $.ajax({
                type: 'post',
                url: '{{route("admin.menu-label.clone")}}',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'id': _this.attr('data-id')
                },
                beforeSend: function (){
                    formLoaded.removeClass('hidden flex').addClass('flex');
                },
                success: function (response) {
                    Toast.fire({icon: 'success', text: response.message});
                    $('#menu-label-accordion-collapse').append(response.html)
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
        $(document).on('submit', '.updateMenuLabelForm', function(e){
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
        $(document).on('submit', '.storeMenuLabelForm', function(e){
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
