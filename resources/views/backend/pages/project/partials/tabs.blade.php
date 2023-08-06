<ul class="flex flex-col p-4">
    <li class="p-2 cursor-pointer tab-btn {{$activeTab == 'general' ? 'active-tab' : '' }}"><a href="{{route('admin.project.edit', $project->id)}}">General</a></li>
    <li class="p-2 cursor-pointer tab-btn {{$activeTab == 'organization-officers' ? 'active-tab' : '' }}"><a href="{{route('admin.project.officers', $project->id)}}">Organization Officers</a></li>
    <li class="p-2 cursor-pointer tab-btn {{$activeTab == 'attachments' ? 'active-tab' : '' }}"><a href="{{route('admin.project.attachments', $project->id)}}">Attachments</a></li>
</ul>