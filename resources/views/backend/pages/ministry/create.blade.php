@extends('backend.master', ['title' => 'Ministry Create', 'page' => 'ministry' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Ministry Create',
            'breadcrumb_title' => 'Ministry',
            'breadcrumb_title_url' => route('admin.ministry.index'),
            'breadcrumb_subtitle' => 'Create',
            'breadcrumb_subtitle_url' => route('admin.ministry.create')
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">New ministry form</h2>
                        <a href="{{route('admin.ministry.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
                              </svg>
                          Show List
                        </a>
                    </div>
                        <form id="ministry-store-form" method="POST" enctype="multipart/form-data" action="{{route('admin.ministry.store')}}">
                            @csrf
                            <div class="relative">
                                <div class="p-6.5">
                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="name" class="mb-2.5 block text-black dark:text-white">
                                                Name in English
                                            </label>
                                            <input type="text" id="name" name="name" placeholder="Name in English"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-name text-danger text-sm font-medium"></small>
        
                                        </div>
        
                                        <div class="w-full xl:w-1/2">
                                            <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                                Name in Bengali
                                            </label>
                                            <input type="text" id="bn_name" name="bn_name" placeholder="Name in Bengali"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-bn_name text-danger text-sm font-medium"></small>
        
                                        </div>
                                    </div>
        
                                    <div class="mb-6">
                                        <label for="description" class="mb-2.5 block text-black dark:text-white">
                                            Description
                                        </label>
                                        <textarea rows="6" id="description" name="description" placeholder="Type ministry description"
                                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                                            <small class="error error-description text-danger text-sm font-medium"></small>
                                    </div>
        
                                    <div class="mb-6">
                                        <label for="status" class="mb-2.5 text-black dark:text-white">
                                        <input class="mr-2 leading-tight" id="status" value="1" name="status" type="checkbox" checked>
                                        <span class="text-sm">
                                            Active Ministry
                                        </span>
                                        </label>
                                    </div>
        
                                    <button class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4"/>
                                        </svg>  
                                        Save Ministry
                                    </button>
                                </div>
                                @include('common.action_loader')
                            </div>
                        </form>
                       
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="module">
    $(document).on('submit', '#ministry-store-form', function(e){
        e.preventDefault();
        let _this = $(this);
        $.ajax({
            type: "post",
            url: "{{route('admin.ministry.store')}}",
            data: _this.serialize(),
            beforeSend: function() {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('flex');
                _this.find('.error').html('');
            },
            success: function (response) {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                Toast.fire({icon: 'success', text: response.message});
                location.href = "{{route('admin.ministry.index')}}";
            },
            error: function (xhr) {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                var responseText = $.parseJSON(xhr.responseText);
                Toast.fire({icon: 'error', text: responseText.message});
                $.each(responseText.errors, function (indexInArray, valueOfElement) { 
                        $('.error-'+indexInArray).html(valueOfElement[0]);
                });
            }
        });
    })
</script>
@endpush
