@extends('backend.master', ['title' => 'Organization Officer Create', 'page' => 'organization-officer' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Organization Officer Create',
            'breadcrumb_title' => 'Organization Officer',
            'breadcrumb_title_url' => route('admin.organization-officer.index'),
            'breadcrumb_subtitle' => 'Create',
            'breadcrumb_subtitle_url' => route('admin.organization-officer.create')
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">New organization officer form</h2>
                        <a href="{{route('admin.organization-officer.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
                              </svg>
                          Show List
                        </a>
                    </div>
                        <form id="organization-officer-store-form" method="POST" enctype="multipart/form-data" action="{{route('admin.organization-officer.store')}}">
                            @csrf
                            <div class="relative">
                                <div class="p-6.5">
                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="organization_id" class="mb-2.5 block text-black dark:text-white">
                                                Organization
                                            </label>
                                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                                <select id="organization_id" required name="organization_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                    <option value="">Select Organization</option>
                                                    @if (count($organizations))
                                                        @foreach ($organizations as $organization)
                                                            <option value="{{$organization->id}}">{{$organization->name}} - {{$organization->bn_name}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <small class="error error-organization_id text-danger text-sm font-medium"></small>
                                            </div>
                                        </div>

                                        <div class="w-full xl:w-1/2">
                                            <label for="organization_office_id" class="mb-2.5 block text-black dark:text-white">
                                                Office
                                            </label>
                                            <div class="relative z-20 bg-transparent dark:bg-form-input">
    
                                            <select id="organization_office_id" required name="organization_office_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                <option value="">Select Office</option>
                                            </select>
                                            <small class="error error-organization_office_id text-danger text-sm font-medium"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="organization_designation_id" class="mb-2.5 block text-black dark:text-white">
                                                Designation
                                            </label>
                                            <div class="relative z-20 bg-transparent dark:bg-form-input">
    
                                            <select id="organization_designation_id" required name="organization_designation_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                <option value="">Select Designation</option>
                                            </select>
                                            <small class="error error-organization_designation_id text-danger text-sm font-medium"></small>
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
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
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
                                            <input type="text" id="name" required name="name" placeholder="Officer Name in English"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-name text-danger text-sm font-medium"></small>
        
                                        </div>
        
                                        <div class="w-full xl:w-1/2">
                                            <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                               Officer Name in Bengali
                                            </label>
                                            <input type="text" id="bn_name" required name="bn_name" placeholder="Officer Name in Bengali"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-bn_name text-danger text-sm font-medium"></small>
        
                                        </div>
                                    </div>

                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="mobile" class="mb-2.5 block text-black dark:text-white">
                                              Officer Mobile
                                            </label>
                                            <input type="text" id="mobile" required name="mobile" placeholder="Officer Name in English"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-mobile text-danger text-sm font-medium"></small>
        
                                        </div>
        
                                        <div class="w-full xl:w-1/2">
                                            <label for="email" class="mb-2.5 block text-black dark:text-white">
                                               Officer Email
                                            </label>
                                            <input type="email" id="email" required name="email" placeholder="Officer Name in Bengali"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-email text-danger text-sm font-medium"></small>
        
                                        </div>
                                    </div>

                                   
        
                                    <div class="mb-6">
                                        <label for="status" class="mb-2.5 text-black dark:text-white">
                                        <input class="mr-2 leading-tight" id="status" value="1" name="status" type="checkbox" checked>
                                        <span class="text-sm">
                                            Active Organization Officer
                                        </span>
                                        </label>
                                    </div>
        
                                    <button class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4"/>
                                        </svg>  
                                        Save Organization Officer
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
    $(document).on('submit', '#organization-officer-store-form', function(e){
        e.preventDefault();
        let _this = $(this);
        $.ajax({
            type: "post",
            url: "{{route('admin.organization-officer.store')}}",
            data: _this.serialize(),
            beforeSend: function() {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('flex');
                _this.find('.error').html('');
            },
            success: function (response) {
                _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                Toast.fire({icon: 'success', text: response.message});
                location.href = "{{route('admin.organization-officer.index')}}";
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

    $(document).on('change', '#organization_id', function(e){
        e.preventDefault();
        let _this = $(this);
        let _this_value = _this.val();
        let _this_office = $('#organization_office_id');
        let _this_designation = $('#organization_designation_id');

        $.ajax({
            type: "get",
            url: "{{route('admin.organization.office.designation.options')}}",
            data: {
                "id" : _this_value
            },
            beforeSend: function () {
                _this.closest('form').find('.form-loaded').removeClass('hidden flex').addClass('flex');
            },
            success: function (response) {
                _this.closest('form').find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                _this_office.html(response.office_options)
                _this_designation.html(response.designation_options);
                Toast.fire({icon: 'success', text: response.message});
            }, 
            error: function(xhr){
                let responseText = $.parseJSON(xhr.responseText);
                Toast.fire({icon: 'error', text: responseText.message});

                _this.closest('form').find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                _this_office.html(responseText.office_options)
                _this_designation.html(responseText.designation_options);
            }
        });

       

    })
</script>
@endpush
