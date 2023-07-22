<!-- Breadcrumb Start -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <h2 class="text-bold text-xl font-weight-bolder">{{$breadcrumb_heading ?? 'Dashboard'}}</h2>

    <nav>
        <ol class="flex items-center gap-2">
            <li><a href="{{$breadcrumb_title_url ?? '#'}}">{{$breadcrumb_title ?? 'Dashboard'}} /</a></li>
            <li class="text-primary"><a href="{{$breadcrumb_subtitle_url ?? '#'}}">{{$breadcrumb_subtitle ?? 'Dashboard'}}</a></li>
        </ol>
    </nav>
</div>
<!-- Breadcrumb End -->
