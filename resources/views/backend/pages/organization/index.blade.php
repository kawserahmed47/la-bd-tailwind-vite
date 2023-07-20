@extends('backend.master', ['title' => 'Organization List', 'page' => 'organization'])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb',[
            'breadcrumb_heading' => 'Organization List',

            'breadcrumb_title' => 'Organization',
            'breadcrumb_title_url' => route('admin.organization.index'),

            'breadcrumb_subtitle' => 'List',
            'breadcrumb_subtitle_url' => route('admin.organization.index')

        ])

        <div class="flex flex-col gap-10">
            
            @include('backend.partials.table.table-03')
        </div>
    </div>
@endsection

@push('js')
@endpush
