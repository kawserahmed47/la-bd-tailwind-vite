@extends('backend.master', ['title' => 'Organization office Create', 'page' => 'organization-office' ])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Organization office Show',
            'breadcrumb_title' => 'Organization office',
            'breadcrumb_title_url' => route('admin.organization-office.index'),
            'breadcrumb_subtitle' => 'Show',
            'breadcrumb_subtitle_url' => route('admin.organization-office.show', $organization_office->id)
        ])

        <div class="flex flex-col gap-10">

            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">Organization office informaton</h2>
                        <a href="{{route('admin.organization-office.index')}}" class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
                              </svg>
                          Show List
                        </a>
                    </div>
                        <form id="organization-store-form" method="POST" enctype="multipart/form-data" action="{{route('admin.organization-office.update', $organization_office->id)}}">
                            @csrf
                            @method('put')
                            <div class="relative">
                                <div class="p-6.5">

                                    <div class="mb-6">
                                        <label for="organization_id" class="mb-2.5 block text-black dark:text-white">
                                            Organization
                                        </label>
                                        <div class="relative z-20 bg-transparent dark:bg-form-input">

                                        <select disabled id="organization_id" name="organization_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                            <option value="">Select Organization</option>
                                            @if (count($organizations))
                                                @foreach ($organizations as $organization)
                                                    <option value="{{$organization->id}}" {{$organization_office->organization_id == $organization->id ? 'selected' :'' }} >{{$organization->name}} - {{$organization->bn_name}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="error error-organization_id text-danger text-sm font-medium"></small>
                                        </div>
                                    </div>

                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <label for="name" class="mb-2.5 block text-black dark:text-white">
                                                Name in English
                                            </label>
                                            <input type="text" id="name" name="name" disabled value="{{$organization_office->name}}" placeholder="Name in English"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-name text-danger text-sm font-medium"></small>
        
                                        </div>
        
                                        <div class="w-full xl:w-1/2">
                                            <label for="bn_name" class="mb-2.5 block text-black dark:text-white">
                                                Name in Bengali
                                            </label>
                                            <input type="text" id="bn_name" name="bn_name" disabled value="{{$organization_office->bn_name}}" placeholder="Name in Bengali"
                                                class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <small class="error error-bn_name text-danger text-sm font-medium"></small>
        
                                        </div>
                                    </div>
        
                                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                        <div class="w-full xl:w-1/2">
                                            <div class="mb-6">
                                                <label for="address" class="mb-2.5 block text-black dark:text-white">
                                                    Address
                                                </label>
                                                <textarea rows="3" disabled id="address" name="address" placeholder="Type organization office address"
                                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{$organization_office->address ?? ''}}</textarea>
                                                    <small class="error error-address text-danger text-sm font-medium"></small>
                                            </div>
                                        </div>
                                        <div class="w-full xl:w-1/2">
                                            <div class="mb-6">
                                                <label for="description" class="mb-2.5 block text-black dark:text-white">
                                                    Description
                                                </label>
                                                <textarea rows="3" disabled id="description" name="description" placeholder="Type organization office description"
                                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{$organization_office->description ?? ''}}</textarea>
                                                    <small class="error error-description text-danger text-sm font-medium"></small>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="mb-6">
                                        <label for="status" class=" text-black dark:text-white ">
                                        <input class="mr-2 leading-tight" value="1" id="status" name="status" disabled type="checkbox" {{$organization_office->status ? 'checked' : ''}}>
                                        <span class="text-sm">
                                            Active Organization office
                                        </span>
                                        </label>
                                    </div>
        
                                </div>
                                <div class="absolute form-loaded left-0 right-0 bottom-0 top-0  z-999 hidden items-center justify-center  bg-white opacity-50">
                                    <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"></div>
                                </div>
                            </div>
                        </form>
                       
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="module">
</script>
@endpush
