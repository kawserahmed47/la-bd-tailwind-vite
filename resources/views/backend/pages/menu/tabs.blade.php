<ul class="flex flex-col p-4">
    <li class="p-2 cursor-pointer tab-btn {{$activeTab == 'label' ? 'active-tab' : '' }}"><a href="{{route('admin.menu.index')}}">Menu Types</a></li>
    <li class="p-2 cursor-pointer tab-btn {{$activeTab == 'parent' ? 'active-tab' : '' }}"><a href="{{route('admin.menu.parent')}}">Parent Menus</a></li>
    <li class="p-2 cursor-pointer tab-btn {{$activeTab == 'child' ? 'active-tab' : '' }}"> <a href="{{route('admin.menu.child')}}">Child Menus</a></li>
</ul>