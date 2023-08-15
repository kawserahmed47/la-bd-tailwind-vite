<div id="project-attachment-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-9999 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <ul
                class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <li class="mr-2 w-full">
                    <div class="flex justify-between justify-items-center items-center mx-4">
                        <div class="">
                            <p
                                class="inline-block p-4 rounded-tl-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                Project Attachment</p>
                        </div>
                        <div class="text-right">
                            {{-- data-modal-hide="add-new-organization-officer-modal" --}}
                            <button type="button" class="text-right close-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
            <div id="manuLabelTabContent" class="p-5">
                <form id="project-attachment-form" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.project-attachment.store') }}">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <input type="hidden" class="id" name="id" value="">
                    <div class="relative">
                        <div class="p-3">
                            <div class="mb-6">
                                <label for="name" class="mb-2.5 block text-black dark:text-white">
                                    Name
                                </label>
                                <input type="text" id="name" name="name" placeholder="Name"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                <small class="error error-name text-danger text-sm font-medium"></small>

                            </div>

                            <div class="mb-6">
                                <label for="description" class="mb-2.5 block text-black dark:text-white">
                                    Description
                                </label>
                                <textarea rows="2" id="description" name="description" placeholder="Write something about this attachment"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                                <small class="error error-description text-danger text-sm font-medium"></small>
                            </div>

                            <div class="mb-6">
                                <div class="flex items-center justify-center w-full">
                                    <div
                                        class="flex flex-col items-center justify-center w-full h-42 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class=" dropzone" id="fileUpload">
                                            <div class="dz-default dz-message flex flex-col items-center text-center align-items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400 dz-button"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 dz-button"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 dz-button">SVG, PNG, JPG or GIF
                                                (MAX. 800x400px)</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>





                            <button
                                class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 19">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4" />
                                </svg>
                                Save the attachment
                            </button>
                        </div>
                        @include('common.action_loader')

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
