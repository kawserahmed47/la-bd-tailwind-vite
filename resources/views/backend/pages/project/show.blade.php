@extends('backend.master', ['title' => 'Project Create', 'page' => 'project' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Project Show',
            'breadcrumb_title' => 'Project',
            'breadcrumb_title_url' => route('admin.project.index'),
            'breadcrumb_subtitle' => 'Show',
            'breadcrumb_subtitle_url' => route('admin.project.show', $project->id)
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">Project informaton</h2>
                        <a href="{{route('admin.project.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
                              </svg>
                          Show List
                        </a>
                    </div>
                    <div class="relative">
                        <div class="p-6.5">
                            
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label for="name" class="mb-2.5 block text-black dark:text-white">
                                        Name in English
                                    </label>
                                    <input type="text" id="name" disabled name="name" value="{{$project->name ?? ''}}"  placeholder="Name in English"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-name text-danger text-sm font-medium"></small>

                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                        Name in Bengali
                                    </label>
                                    <input type="text" id="bn_name" disabled name="bn_name"  value="{{$project->bn_name ?? ''}}" placeholder="Name in Bengali"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-bn_name text-danger text-sm font-medium"></small>

                                </div>
                            </div>

                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label for="organization_id" class="mb-2.5 block text-black dark:text-white">
                                        Prospective organization
                                    </label>

                                    <select id="organization_id" name="organization_id" disabled class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
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
                                    <select id="ministry_id" name="ministry_id" disabled class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
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

                                    <select id="division_id" name="division_id" disabled class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
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
                                    <select id="district_id" name="district_id" disabled class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
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
                                        <select id="section_id" disabled name="section_id" required class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
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
                                        <select id="status" name="status" disabled class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
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
                                <textarea rows="1" id="description" disabled name="description" placeholder="Type project description"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{$project->description}}</textarea>
                                    <small class="error error-description text-danger text-sm font-medium"></small>
                            </div>
                        
                        </div>
                        @include('common.action_loader')

                    </div>
                       
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="module">
</script>
@endpush
