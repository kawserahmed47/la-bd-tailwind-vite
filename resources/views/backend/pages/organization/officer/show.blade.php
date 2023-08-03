@extends('backend.master', ['title' => 'Organization officer Create', 'page' => 'organization-officer' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Organization officer Show',
            'breadcrumb_title' => 'Organization officer',
            'breadcrumb_title_url' => route('admin.organization-officer.index'),
            'breadcrumb_subtitle' => 'Show',
            'breadcrumb_subtitle_url' => route('admin.organization-officer.show', $organization_officer->id)
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">Organization officer informaton</h2>
                        <a href="{{route('admin.organization-officer.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
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
                                    <label for="organization_id" class="mb-2.5 block text-black dark:text-white">
                                        Organization
                                    </label>
                                    <div class="relative z-20 bg-transparent dark:bg-form-input">
                                        <select id="organization_id" disabled name="organization_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                            <option value="">Select Organization</option>
                                            @if (count($organizations))
                                                @foreach ($organizations as $organization)
                                                    <option value="{{$organization->id}}" {{$organization->id == $organization_officer->office->organization_id ? 'selected' : '' }} >{{$organization->name}} - {{$organization->bn_name}} </option>
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

                                    <select id="organization_office_id" disabled name="organization_office_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                        <option value="">Select Office</option>
                                        @if (count($offices))
                                            @foreach ($offices as $office)
                                                <option value="{{$office->id}}" {{$office->id == $organization_officer->organization_office_id ? 'selected' : '' }}>{{$office->name}}</option>
                                            @endforeach
                                        @endif
                                        
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

                                    <select id="organization_designation_id" disabled name="organization_designation_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                        <option value="">Select Designation</option>
                                        @if (count($designations))
                                            @foreach ($designations as $designation)
                                                <option value="{{$designation->id}}" {{$office->id == $organization_officer->organization_designation_id ? 'selected' : '' }} >{{$designation->name}}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                    <small class="error error-organization_designation_id text-danger text-sm font-medium"></small>
                                    </div>
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label for="role_id" class="mb-2.5 block text-black dark:text-white">
                                        Role
                                    </label>
                                    <div class="relative z-20 bg-transparent dark:bg-form-input">

                                    <select id="role_id" name="role_id" disabled class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                        <option value="">Select Role</option>
                                        @if (count($roles))
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}" {{$role->id == $organization_officer->user->role_id ? 'selected' : '' }} >{{$role->name}}</option>
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
                                    <input type="text" id="name" disabled name="name" value="{{$organization_officer->user->name ?? ''}}" placeholder="Officer Name in English"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-name text-danger text-sm font-medium"></small>

                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                        Officer Name in Bengali
                                    </label>
                                    <input type="text" id="bn_name" disabled name="bn_name" value="{{$organization_officer->user->bn_name ?? ''}}" placeholder="Officer Name in Bengali"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-bn_name text-danger text-sm font-medium"></small>

                                </div>
                            </div>

                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label for="mobile" class="mb-2.5 block text-black dark:text-white">
                                        Officer Mobile
                                    </label>
                                    <input type="text" id="mobile" disabled name="mobile" value="{{$organization_officer->user->mobile}}" placeholder="Officer Name in English"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-mobile text-danger text-sm font-medium"></small>

                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label for="email" class="mb-2.5 block text-black dark:text-white">
                                        Officer Email
                                    </label>
                                    <input type="email" id="email" disabled name="email" value="{{$organization_officer->user->email}}" placeholder="Officer Name in Bengali"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-email text-danger text-sm font-medium"></small>

                                </div>
                            </div>

                            

                            <div class="mb-6">
                                <label for="status" class="mb-2.5 text-black dark:text-white">
                                <input disabled class="mr-2 leading-tight" id="status" value="1" name="status" type="checkbox" {{$organization_officer->status ? 'checked' : ''}}>
                                <span class="text-sm">
                                    Active Organization Officer
                                </span>
                                </label>
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
