<div id="project-ownership-edit-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-9999 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <ul
                class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <li class="mr-2 w-full">
                    <div class="flex justify-between justify-items-center items-center mx-4">
                        <div class="">
                            <p
                                class="inline-block p-4 rounded-tl-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                Project Ownhership</p>
                        </div>
                        <div class="text-right">
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

            <div class="p-5">
                <form id="project-ownership-edit-form" method="POST" enctype="multipart/form-data"  action="">
                    @csrf
                    @method('put')
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <input type="hidden" id="edit_id" name="id" value="">

                    <div class="relative">
                        <div class="p-3">

                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/3">
                                    <div class="mb-6">
                                        <label for="edit_name" class="mb-2.5 block text-black dark:text-white">
                                            Name
                                        </label>                                        
                                        <input type="text" id="edit_name" name="name" placeholder="Name"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-name text-danger text-sm font-medium"></small>
                                    </div>
                                </div>
                                <div class="w-full xl:w-1/3">
                                    <div class="mb-6">
                                        <label for="edit_father_name" class="mb-2.5 block text-black dark:text-white">
                                            Father Name
                                        </label>                                        
                                        <input type="text" id="edit_father_name" name="father_name" placeholder="Father Name"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-name text-danger text-sm font-medium"></small>
                                    </div>
                                </div>
                                <div class="w-full xl:w-1/3">
                                    <div class="mb-6">
                                        <label for="edit_mother_name" class="mb-2.5 block text-black dark:text-white">
                                            Mother Name
                                        </label>                                        
                                        <input type="text" id="edit_mother_name" name="mother_name" placeholder="Mother Name"
                                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                        <small class="error error-name text-danger text-sm font-medium"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="edit_address" class="mb-2.5 block text-black dark:text-white">
                                    Address
                                </label>                                        
                                <textarea rows="2" id="edit_address" name="address" placeholder="Write full address of this owner"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                                <small class="error error-address text-danger text-sm font-medium"></small>
                            </div>

                            <button type="submit" class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 19">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4" />
                                </svg>
                                Save the record
                            </button>
                        </div>
                        @include('common.action_loader')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
