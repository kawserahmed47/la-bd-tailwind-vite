@extends('backend.master', ['title' => 'Section Officer Create', 'page' => 'section-officer' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Section Officer Edit',
            'breadcrumb_title' => 'Section Officer',
            'breadcrumb_title_url' => route('admin.section-officer.index'),
            'breadcrumb_subtitle' => 'Edit',
            'breadcrumb_subtitle_url' => route('admin.section-officer.edit', $section_officer->id)
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">Section Officer edit form</h2>
                        <a href="{{route('admin.section-officer.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
                              </svg>
                          Show List
                        </a>
                    </div>
                        <form id="section-officer-store-form" method="POST" enctype="multipart/form-data" action="{{route('admin.section-officer.update', $section_officer->id)}}">
                            @csrf
                            @method('put')
                           
                            <div class="relative">
                                <div class="p-6.5">
                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="section_id" class="mb-2.5 block text-black dark:text-white">
                                                Section
                                            </label>
                                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                                <select id="section_id" required name="section_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    <option value="">Select Section</option>
                                                    @if (count($sections))
                                                        @foreach ($sections as $section)
                                                            <option value="{{$section->id}}" {{$section->id == $section_officer->section_id ? 'selected' : '' }} >{{$section->name}} - {{$section->bn_name}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <small class="error error-section_id text-danger text-sm font-medium"></small>
                                            </div>
                                        </div>

                                        <div class="w-full xl:w-1/2">
                                            <label for="role_id" class="mb-2.5 block text-black dark:text-white">
                                                Role
                                            </label>
                                            <div class="relative z-20 bg-transparent dark:bg-form-input">
    
                                            <select id="role_id" name="role_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                <option value="">Select Role</option>
                                                @if (count($roles))
                                                    @foreach ($roles as $role)
                                                        <option value="{{$role->id}}" {{$role->id == $section_officer->user->role_id ? 'selected' : '' }} >{{$role->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <small class="error error-role_id text-danger text-sm font-medium"></small>
                                            </div>
                                        </div>
                                    </div>

                                 

                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="name" class="mb-2.5 block text-black dark:text-white">
                                              Officer Name in English
                                            </label>
                                            <input type="text" id="name" required name="name" value="{{$section_officer->user->name ?? ''}}" placeholder="Officer Name in English"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-name text-danger text-sm font-medium"></small>
        
                                        </div>
        
                                        <div class="w-full xl:w-1/2">
                                            <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                               Officer Name in Bengali
                                            </label>
                                            <input type="text" id="bn_name" required name="bn_name" value="{{$section_officer->user->bn_name ?? ''}}" placeholder="Officer Name in Bengali"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-bn_name text-danger text-sm font-medium"></small>
        
                                        </div>
                                    </div>

                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="mobile" class="mb-2.5 block text-black dark:text-white">
                                              Officer Mobile
                                            </label>
                                            <input type="text" id="mobile" required name="mobile" value="{{$section_officer->user->mobile}}" placeholder="Officer Name in English"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-mobile text-danger text-sm font-medium"></small>
        
                                        </div>
        
                                        <div class="w-full xl:w-1/2">
                                            <label for="email" class="mb-2.5 block text-black dark:text-white">
                                               Officer Email
                                            </label>
                                            <input type="email" id="email" required name="email" value="{{$section_officer->user->email}}" placeholder="Officer Name in Bengali"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-email text-danger text-sm font-medium"></small>
        
                                        </div>
                                    </div>

                                   
        
                                    <div class="mb-6">
                                        <label for="status" class="mb-2.5 text-black dark:text-white">
                                        <input class="mr-2 leading-tight" id="status" value="1" name="status" type="checkbox" {{$section_officer->status ? 'checked' : ''}}>
                                        <span class="text-sm">
                                            Active Section Officer
                                        </span>
                                        </label>
                                    </div>
        
                                    <button class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4"/>
                                        </svg>  
                                        Update Section Officer
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
    $(document).on('submit', '#section-officer-store-form', function(e){
        e.preventDefault();
        let _this = $(this);
        $.ajax({
            type: "put",
            url: _this.attr('action'),
            data: _this.serialize(),
            beforeSend: function() {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('flex');
                _this.find('.error').html('');
            },
            success: function (response) {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                Toast.fire({icon: 'success', text: response.message});
                location.href = "{{route('admin.section-officer.index')}}";
            },
            error: function (xhr) {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                var responseText = $.parseJSON(xhr.responseText);
                Toast.fire({icon: 'error', text: responseText.message});
                if (responseText.errors.length) {
                    $.each(responseText.errors, function (indexInArray, valueOfElement) { 
                         $('.error-'+indexInArray).html(valueOfElement[0]);
                    });
                }
            }
        });
    })

</script>
@endpush
