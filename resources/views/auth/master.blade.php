<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Land Acqusition - {{ $title ?? 'Auth' }}</title>
    <!-- Styles -->
    @include('common.styles')
    @stack('css')
</head>

<body>
    
    @yield('content')

    @stack('js')
</body>

</html>
