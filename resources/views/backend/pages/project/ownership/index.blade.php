@extends('backend.master', ['title' => 'Project Ownership', 'page' => 'project-ownership'])

@push('css')
@endpush

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-3 2xl:p-5">
        @include('backend.partials.breadcrumb', [
            'breadcrumb_heading' => 'Project Edit',
            'breadcrumb_title' => 'Project',
            'breadcrumb_title_url' => route('admin.project.index'),
            'breadcrumb_subtitle' => 'Ownership',
            'breadcrumb_subtitle_url' => route('admin.project.ownership', $project->id),
        ])
        <div class="flex flex-col gap-10">
            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark px-3 pb-2.5 sm:px-5.5 xl:pb-1">
                    <div
                        class="flex flex-col border-b border-[#eee] sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                        <h2 class="text-bold text-lg font-weight-bolder">{{ $project->name }}</h2>
                        <a href="{{ route('admin.project.index') }}"
                            class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 17 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01" />
                            </svg>
                            Show List
                        </a>
                    </div>
                    <div class="flex flex-row">
                        <!-- Vertical Tab Menu -->
                        <div class="w-1/4">
                            @include('backend.pages.project.partials.tabs', [
                                'activeTab' => 'ownership',
                            ])
                        </div>

                        <!-- Tab Content -->
                        <div class="w-3/4 p-2">
                            <div class="tab-content active-content">
                                <div
                                    class="w-full pb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div
                                        class="flex flex-col border-b border-[#eee]  sm:flex-row sm:items-center sm:justify-between gap-3  py-4 px-4 md:px-6 xl:px-7.5">
                                        <h2 class="text-bold text-lg font-weight-bolder">Project Ownership</h2>
                                        <button type="button" data-modal-target="project-ownership-modal"
                                            id="add-new-ownership-btn"
                                            class="inline-flex  items-center justify-center gap-2.5 rounded-full bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                                            <span>
                                                <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </span>
                                            Add New
                                        </button>
                                    </div>
                                    <div class="relative max-w-full overflow-x-auto pb-5 project-ownership-table-section">
                                        <table class="w-full table-auto">
                                            <thead>
                                                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                                    <th class=" py-4 px-4 font-medium text-black dark:text-white">
                                                        ID
                                                    </th>
                                                    <th class=" py-4 px-4 font-medium text-black dark:text-white">
                                                        Name
                                                    </th>
                                                    <th class=" font-medium text-black dark:text-white">
                                                        Father Name
                                                    </th>
                                                    <th class=" font-medium text-black dark:text-white">
                                                        Address
                                                    </th>
                                                    <th
                                                        class="max-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if (count($land_owners))
                                                    @foreach ($land_owners as $land_owner)
                                                        <tr>
                                                            <td class="text-center ml-2">{{$land_owner->owner->owner_id}}</td>
                                                            <td
                                                                class="border-b border-[#eee] py-3 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                                <h5 class="font-medium text-black dark:text-white">{{$land_owner->owner->name}}</h5>
                                                            </td>
                                                            <td
                                                                class="border-b border-[#eee] py-3 px-4 dark:border-strokedark">
                                                                <p class="text-black dark:text-white">{{$land_owner->owner->father_name}}</p>
                                                            </td>
                                                            <td
                                                                class="border-b border-[#eee] py-3 px-4 dark:border-strokedark">
                                                                <p class="text-black dark:text-white">{{$land_owner->owner->address ?? ''}}</p>
                                                            </td>
                                                          
                                    

                                                            <td
                                                                class="border-b border-[#eee] py-3 px-4 dark:border-strokedark">
                                                                <div class="flex items-center space-x-3.5">
                                                                    <button type="button"

                                                                        data-id="{{$land_owner->owner->id}}"
                                                                        data-name="{{$land_owner->owner->name}}"
                                                                        data-father="{{$land_owner->owner->father_name}}"
                                                                        data-mother="{{$land_owner->owner->mother_name}}"
                                                                        data-address="{{$land_owner->owner->address}}"
                                                                        data-action="{{route('admin.land-owner.update', $land_owner->owner->id)}}"

                                                                        data-tooltip-target="tooltip-edit"
                                                                        data-modal-target="project-ownership-edit-modal"
                                                                        data-tooltip-placement="top"
                                                                        class="hover:text-primary project-ownership-edit-btn">
                                                                        <svg class="w-[18px] h-[18px] text-gray-500 dark:text-white"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 20 20">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="1.5"
                                                                                d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                                                        </svg>
                                                                    </button>

                                                                    <a data-tooltip-target="tooltip-show"
                                                                        data-tooltip-placement="top"
                                                                        href="#"
                                                                        onclick="alert('Under constructions! You will able to see here all details of land information of this owner...')"
                                                                        class="hover:text-primary">
                                                                        <svg class="fill-current text-gray-500 dark:text-white"
                                                                            width="18" height="18"
                                                                            viewBox="0 0 18 18" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                                                fill="" />
                                                                            <path
                                                                                d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                                                fill="" />
                                                                        </svg>
                                                                    </a>

                                                                    <form class="project-ownership-delete-form"
                                                                        method="POST"
                                                                        action="{{route('admin.land-owner.destroy', $land_owner->owner->id)}}">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            data-tooltip-target="tooltip-delete"
                                                                            data-tooltip-placement="top"
                                                                            class="hover:text-primary">
                                                                            <svg class="fill-current text-gray-500 dark:text-white"
                                                                                width="18" height="18"
                                                                                viewBox="0 0 18 18" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                                                                    fill="" />
                                                                                <path
                                                                                    d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                                                                    fill="" />
                                                                                <path
                                                                                    d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                                                                    fill="" />
                                                                                <path
                                                                                    d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                                                                    fill="" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-danger text-center">No Record Found!</td>
                                                    </tr>
                                                @endif


                                            </tbody>
                                        </table>
                                        @include('common.action_loader')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('common.tooltip', ['tooltipName' => 'tooltip-edit', 'tooltipTitle' => 'Edit'])
    @include('common.tooltip', ['tooltipName' => 'tooltip-show', 'tooltipTitle' => 'Show'])
    @include('common.tooltip', ['tooltipName' => 'tooltip-delete', 'tooltipTitle' => 'Delete'])


    @include('backend.pages.project.ownership.modals.ownership_create_modal')
    @include('backend.pages.project.ownership.modals.ownership_edit_modal')




@endsection

@push('js')
    <script type="module">
        const _this_modal_element = document.getElementById('project-ownership-modal');
        const modal = new Modal(_this_modal_element);

        const _this_edit_modal_element = document.getElementById('project-ownership-edit-modal');
        const edit_modal = new Modal(_this_edit_modal_element);

        $(document).on('click', '#add-new-ownership-btn', function(e) {
            e.preventDefault();
            let _this_form = $('#project-attachment-form');
            _this_form.find('.id').val('');
            _this_form.trigger("reset");
            modal.show();
        })

        $(document).on('click', '.project-ownership-edit-btn', function(e){
            e.preventDefault();
            let _this = $(this);
            let _this_form = $('#project-ownership-edit-form');
            _this_form.attr('action', _this.attr('data-action'));
            _this_form.find('#edit_id').val(_this.attr('data-id'));
            _this_form.find('#edit_name').val(_this.attr('data-name'));
            _this_form.find('#edit_father_name').val(_this.attr('data-father'));
            _this_form.find('#edit_mother_name').val(_this.attr('data-mother'));
            _this_form.find('#edit_address').val(_this.attr('data-address'));

            edit_modal.show();
        })

        $(document).on('click', '.close-modal', function(e) {
            e.preventDefault();
            let _this_form = $('form');
            _this_form.find('.id').val('');
            _this_form.trigger("reset");
            modal.hide();
            edit_modal.hide()
        })

        $(document).on('submit', '#project-ownership-form, #project-ownership-edit-form', function(e) {
            e.preventDefault();
            let _this = $(this);
            $.ajax({
                type: "post",
                url: _this.attr('action'),
                data: _this.serialize(),
                beforeSend: function() {
                    _this.find('.form-loaded').removeClass('hidden flex').addClass('flex');
                    _this.find('.error').html('');
                },
                success: function(response) {
                    _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                    Toast.fire({icon: 'success', text: response.message});
                    location.reload();
                },
                error: function(xhr) {
                    _this.find('.form-loaded').removeClass('hidden flex').addClass('hidden');
                    var responseText = $.parseJSON(xhr.responseText);
                    Toast.fire({icon: 'error', text: responseText.message});
                    if (responseText.errors.length) {
                        $.each(responseText.errors, function(indexInArray, valueOfElement) {
                            $('.error-' + indexInArray).html(valueOfElement[0]);
                        });
                    }
                }
            });

        })

        $(document).on('submit', '.project-ownership-delete-form', function(e) {
            e.preventDefault()
            let _this = $(this);
            let formLoaded = _this.closest('.project-ownership-table-section').find('.form-loaded');
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
                        type: _this.attr('method'),
                        url: _this.attr('action'),
                        data: _this.serialize(),
                        beforeSend: function() {
                            formLoaded.removeClass('hidden flex').addClass('flex');
                        },
                        success: function(response) {
                            _this.closest('tr').remove();
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


        $(document).on('change', '#thana_id, #survey', function(e){
            e.preventDefault();
            let _thana_id = $('#thana_id').val();
            let _survey_id = $('#survey').val();
            let _mouza = $("#mouza");
            $.ajax({
                type: "get",
                url: "{{route('admin.mouza.getMouzasByThanaAndSurvey')}}",
                data: {
                    'thana_id' : _thana_id,
                    'survey_id' : _survey_id
                },
                contentType: "charset=utf-8",
                cache: false,
                beforeSend: function(){
                    _mouza.html('<option value="">Select Mouza</option>');
                },
                success: function (response) {
                    if(response.mouzas.length){
                        response.mouzas.forEach(mouza => {
                            let _option = '<option value="'+mouza.id+'">'+mouza.bn_name+' - '+mouza.jl_number+'  </option>';
                            _mouza.append(_option);
                        });
                    }
                }, 
                error: function(xhr){
                    Toast.fire({icon: 'error', text: "Something went wrong!"});
                }
            });
        })

    </script>
@endpush
