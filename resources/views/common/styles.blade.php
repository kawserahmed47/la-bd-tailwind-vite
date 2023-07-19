  <!-- Meta Tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{asset('images/favicon/favicon.ico')}}">

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
