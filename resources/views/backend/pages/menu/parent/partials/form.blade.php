<form class="{{ $form_class ?? 'not-found' }}" action="{{ $form_action ?? 'not-found' }}" method="POST">
    @csrf
    <input type="hidden" name="menu_label_id" value="{{$menu_label_id ?? 0}}">
    <div class="relative">
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" value="{{ $item->name ?? '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
        </div>
        <div class="mb-6">
            <label for="bn_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                in Bengali</label>
            <input type="text" id="bn_name" name="bn_name" placeholder="Name in Bengali" value="{{ $item->bn_name ?? '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
        </div>
        <div class="mb-6">
            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                endpoint</label>
            <input type="text" id="slug" placeholder="Endpoint" name="slug" value="{{ $item->slug ?? '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
        </div>
        <div class="mb-6">
            <label for="order_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order
                number</label>
            <input type="number" placeholder="1"  min="1" max="99" id="order_id" name="order_id" value="{{ $item->order_id ?? '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
        </div>
        <div class="mb-6">
            <label for="icon"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>
            <textarea id="icon" name="icon" placeholder="<i class='fa fa-user'></i>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $item->icon ?? '' }}</textarea>
        </div>
        <div class="mb-6">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" placeholder="Description"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $item->description ?? '' }}</textarea>
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input name="status" id="status" type="checkbox"
                    {{ isset($item->status) ? ($item->status ? 'checked' : '') : 'chekced' }} value="1"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
            </div>
            <label for="status" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

        @if (isset($item->id) && $item->id)
            @method('put')
            <button data-id="{{ $item->id }}" type="button"
                class="text-white bg-red-700 hover:bg-red-800  focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 remove">Remove</button>
            <button data-id="{{ $item->id }}" data-label="{{$item->menu_label_id ?? $menu_label_id}}" type="button"
                class="text-white bg-green-700 hover:bg-green-800  focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 clone">Duplicate</button>
        @endif
        @include('common.action_loader')
    </div>

</form>
