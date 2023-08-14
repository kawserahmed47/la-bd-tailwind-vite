@extends('backend.master', ['title' => 'Project Create', 'page' => 'project' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Project Edit',
            'breadcrumb_title' => 'Project',
            'breadcrumb_title_url' => route('admin.project.index'),
            'breadcrumb_subtitle' => 'Edit',
            'breadcrumb_subtitle_url' => route('admin.project.edit', $project->id)
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">Project edit form</h2>
                        <a href="{{route('admin.project.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
                              </svg>
                          Show List
                        </a>
                    </div>
                    <div class="flex flex-row">
                        <!-- Vertical Tab Menu -->
                        <div class="w-1/4">
                            @include('backend.pages.project.partials.tabs', ['activeTab' => 'general'])
                        </div>
    
                        <!-- Tab Content -->
                        <div class="w-3/4 p-2">
                            <div class="tab-content active-content">
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
                                    <form id="project-store-form" method="POST" enctype="multipart/form-data" action="{{route('admin.project.update', $project->id)}}">
                                        @csrf
                                        @method('put')
                                        <div class="relative">
                                            <div class="p-3">
                                                
                                                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                    <div class="w-full xl:w-1/2">
                                                        <label for="name" class="mb-2.5 block text-black dark:text-white">
                                                            Name in English
                                                        </label>
                                                        <input type="text" id="name" name="name" value="{{$project->name ?? ''}}"  placeholder="Name in English"
                                                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                            <small class="error error-name text-danger text-sm font-medium"></small>
                    
                                                    </div>
                    
                                                    <div class="w-full xl:w-1/2">
                                                        <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                                            Name in Bengali
                                                        </label>
                                                        <input type="text" id="bn_name" name="bn_name"  value="{{$project->bn_name ?? ''}}" placeholder="Name in Bengali"
                                                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                            <small class="error error-bn_name text-danger text-sm font-medium"></small>
                    
                                                    </div>
                                                </div>
            
                                                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                    <div class="w-full xl:w-1/2">
                                                        <label for="organization_id" class="mb-2.5 block text-black dark:text-white">
                                                            Prospective organization
                                                        </label>
            
                                                        <select id="organization_id" name="organization_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                            <option value="">Select Project</option>
                                                            @if (count($organizations))
                                                                @foreach ($organizations as $organization)
                                                                    <option value="{{$organization->id}}" {{$organization->id == $project->organization_id ? 'selected' : '' }} >{{$organization->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <small class="error error-organization_id text-danger text-sm font-medium"></small>
                    
                                                    </div>
                    
                                                    <div class="w-full xl:w-1/2">
                                                        <label for="ministry_id" class="mb-2.5 block text-black dark:text-white">
                                                            Ministry
                                                        </label>
                                                        <select id="ministry_id" name="ministry_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                            <option value="">Select Ministry</option>
                                                            @if (count($ministries))
                                                                @foreach ($ministries as $ministry)
                                                                    <option value="{{$ministry->id}}" {{$ministry->id == $project->ministry_id ? 'selected' : '' }} >{{$ministry->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <small class="error error-ministry_id text-danger text-sm font-medium"></small>
                                                    </div>
                                                </div>
            
                                                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                    <div class="w-full xl:w-1/2">
                                                        <label for="division_id" class="mb-2.5 block text-black dark:text-white">
                                                            Division
                                                        </label>
            
                                                        <select id="division_id" name="division_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                            <option value="">Select Division</option>
                                                            @if (count($divisions))
                                                                @foreach ($divisions as $division)
                                                                    <option value="{{$division->id}}" {{$division->id == $project->district->division_id ? 'selected' : '' }} >{{$division->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <small class="error error-division_id text-danger text-sm font-medium"></small>
                    
                                                    </div>
                    
                                                    <div class="w-full xl:w-1/2">
                                                        <label for="district_id" class="mb-2.5 block text-black dark:text-white">
                                                            District
                                                        </label>
                                                        <select id="district_id" name="district_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                            <option value="">Select District</option>
                                                            @if (count($districts))
                                                                @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}" {{$district->id == $project->district_id ? 'selected' : ''}} >{{$district->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <small class="error error-district_id text-danger text-sm font-medium"></small>
                                                    </div>
                                                </div>
                    
                                                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                   
                                                    <div class="w-full xl:w-1/2">
                                                        <div class="mb-6">
                                                            <label for="section_id" class="mb-2.5 block text-black dark:text-white">
                                                                Section
                                                            </label>                                        
                                                            <select id="section_id" name="section_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                                @if (count($sections))
                                                                    @foreach ($sections as $section)
                                                                        <option value="{{$section->id}}" {{$project->section_id == $section->id ? 'selected' : ''}} >{{$section->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-full xl:w-1/2">
                                                        <div class="mb-6">
                                                            <label for="status" class="mb-2.5 block text-black dark:text-white">
                                                                Status
                                                            </label>                                        
                                                            <select id="status" name="status" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                                @foreach (projectStatus() as $key=>$status)
                                                                    <option value="{{$key}}" data-color="{{$status['color']}}" {{$project->status == $key ? 'selected' : '' }} >{{$status['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                    <div class="mb-6">
                                                        <label for="description" class="mb-2.5 block text-black dark:text-white">
                                                            Description
                                                        </label>
                                                        <textarea rows="1" id="description" name="description" placeholder="Type project description"
                                                            class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{$project->description}}</textarea>
                                                            <small class="error error-description text-danger text-sm font-medium"></small>
                                                    </div>
            
            
                    
                                                <button class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4"/>
                                                    </svg>  
                                                    Update Project
                                                </button>
                                            </div>
                                            @include('common.action_loader')
            
                                        </div>
                                    </form>
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
    $(document).on('submit', '#project-store-form', function(e){
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
                location.href = "{{route('admin.project.current')}}";
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
