  <!-- Meta Tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{asset('images/favicon/favicon.ico')}}">

  <!-- Styles -->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('build/assets/app-eba0234a.css')}}">
  <script src="{{asset('build/assets/app-8b0b5c4d.js')}}"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
