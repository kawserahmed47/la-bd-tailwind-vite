<div id="edit-organization-officer-modal" data-modal-target="edit-organization-officer-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-9999 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative max-w-md">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <ul
                class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <li class="mr-2 w-full">
                    <div class="flex justify-between justify-items-center items-center mx-4">
                        <div class="">
                            <p
                                class="inline-block p-4 rounded-tl-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">
                                Organization Officers</p>
                        </div>
                        <div class="text-right">
                            <button type="button" class="text-right" data-modal-hide="edit-organization-officer-modal">
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
                <form id="project-store-form" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.project.update', $project->id) }}">
                    @csrf
                    @method('put')
                    <div class="relative">
                        <div class="p-3">

                            <div class="mb-4.5">

                                <label for="organization_office_id" class="mb-2.5 block text-black dark:text-white">
                                    Organization Office
                                </label>

                                <select id="organization_office_id" name="organization_office_id" required
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Select Office</option>
                                    @if (count($organization_offices))
                                        @foreach ($organization_offices as $office)
                                            <option value="{{ $office->id }}">
                                                {{ $office->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <small
                                    class="error error-organization_office_id text-danger text-sm font-medium"></small>


                            </div>

                            <div class="mb-4.5">
                                <label for="organization_designation_id"
                                    class="mb-2.5 block text-black dark:text-white">
                                    Organization Desingation
                                </label>

                                <select id="organization_designation_id" name="organization_designation_id" required
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Select Desingation</option>
                                    @if (count($organization_designations))
                                        @foreach ($organization_designations as $designation)
                                            <option value="{{ $designation->id }}">
                                                {{ $designation->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <small
                                    class="error error-organization_designation_id text-danger text-sm font-medium"></small>
                            </div>

                            <div class="mb-4.5">
                                <label for="organization_officer_id" class="mb-2.5 block text-black dark:text-white">
                                    Organization Officer
                                </label>

                                <select id="organization_officer_id" name="organization_officer_id" required
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Select Officer</option>
                                </select>
                                <small
                                    class="error error-organization_officer_id text-danger text-sm font-medium"></small>
                            </div>

                            <button
                                class="flex w-full items-center gap-3 justify-center rounded bg-primary p-3 font-medium text-white">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 19">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4" />
                                </svg>
                                Update Officer Information
                            </button>
                        </div>
                        @include('common.action_loader')

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
