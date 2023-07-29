<div class="menu-label-accordion-row">
    <h2 id="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}">
        <button type="button"
            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border  border-gray-200   focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
            data-accordion-target="#menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}" aria-expanded="true"
            aria-controls="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}">
            <span>{{$child->name}}</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div id="menu-label-accordion-collapse-body-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}" class="hidden"
        aria-labelledby="menu-label-accordion-collapse-heading-l{{$menu_label->id}}-m{{$menu->id}}-c{{$child->id}}">
        <div class="p-5 border  border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        
            @include('backend.pages.menu.partials.form',
                [
                    'form_id' => 'childMenuForm',
                    'item' => $child
                ]
            )


        </div>
    </div>
</div>