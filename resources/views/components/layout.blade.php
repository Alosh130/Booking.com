<!DOCTYPE html>
<html lang="en" class="scroll-smooth" x-data="{ mobileMenuOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0d47a1">
    <title>@yield('title', 'Booking.com') | Hotels and More</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" rel="stylesheet">

    <!-- Datepicker & Daterange CSS -->
    <link href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- App Styles -->
    @vite(['resources/css/app.css'])

    <style>
      [x-cloak] { display: none !important; }
      body { font-family: 'Roboto', sans-serif; min-height: 100vh; display: flex; flex-direction: column; }

      main { flex: 1; }

      .dropdown { position: relative; display: inline-block; }
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #1e293b;
        min-width: 160px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 0.5rem;
        z-index: 2000;
        color: #f1f5f9;
      }
      .dropdown-content.show { display: block; }

      .daterangepicker {
          background-color: #1e293b !important;
          color: #f1f5f9 !important;
          border: 1px solid #334155 !important;
      }
      .daterangepicker .calendar-table {
          background-color: #1e293b !important;
          color: #f1f5f9 !important;
      }
      .daterangepicker .drp-buttons {
          background-color: #1e293b !important;
          border-top: 1px solid #334155 !important;
      }
      .daterangepicker td.available:hover,
      .daterangepicker th.available:hover {
          background-color: #334155 !important;
      }
      .daterangepicker td.in-range,
      .daterangepicker td.active,
      .daterangepicker td.start-date,
      .daterangepicker td.end-date {
          background-color: #3b82f6 !important;
          color: #ffffff !important;
      }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200">

  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded z-50">
    Skip to content
  </a>

  <header class="bg-white dark:bg-slate-800 shadow fixed w-full top-0 z-50">
    <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
      <div class="flex items-center space-x-6">
        <a href="{{ url('/') }}" class="flex items-center">
          <span class="text-blue-600 dark:text-blue-400 text-2xl font-bold">booking.com</span>
        </a>
        <div class="hidden md:flex items-center space-x-4">
          <button class="flex items-center text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none">
            <i class="fa-solid fa-globe mr-2"></i><span>English (US)</span>
          </button>
          <button class="flex items-center text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none">
            <i class="fa-solid fa-dollar-sign mr-2"></i><span>USD</span>
          </button>
          <a href="/pick_a_property?" class="text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400">List your property</a>
        </div>
      </div>

      <div class="flex items-center space-x-4">
        @unless(Request::is('login', 'register', 'logout'))
          @auth
            <a href="{{ route('auth.destroy') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hidden md:inline-block bg-blue-100 dark:bg-slate-700 px-4 py-2 rounded-md hover:bg-blue-200 dark:hover:bg-slate-600 text-blue-800 dark:text-slate-200">Logout</a>
            <form id="logout-form" action="{{ route('auth.destroy') }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
          @else
            <a href="{{ route('register.index') }}" class="hidden md:inline-block bg-blue-100 dark:bg-slate-700 px-4 py-2 rounded-md hover:bg-blue-200 dark:hover:bg-slate-600 text-blue-800 dark:text-slate-200">Register</a>
            <a href="{{ route('login') }}" class="hidden md:inline-block bg-blue-100 dark:bg-slate-700 px-4 py-2 rounded-md hover:bg-blue-200 dark:hover:bg-slate-600 text-blue-800 dark:text-slate-200">Sign In</a>
          @endauth
        @endunless

        <button @click="darkMode = !darkMode" class="p-2 rounded-md hover:bg-slate-200 dark:hover:bg-slate-700 focus:outline-none">
          <template x-if="!darkMode"><i class="fa-regular fa-moon"></i></template>
          <template x-if="darkMode"><i class="fa-regular fa-sun"></i></template>
        </button>
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-md hover:bg-slate-200 dark:hover:bg-slate-700 focus:outline-none">
          <i class="fa-solid fa-bars text-xl"></i>
        </button>
      </div>

      <div x-cloak x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="absolute top-full left-0 w-full bg-white dark:bg-slate-800 shadow-md md:hidden">
        <div class="px-4 py-3 space-y-2">
          <a href="/pick_a_property?" class="block">List your property</a>
          @unless(Request::is('login', 'register', 'logout'))
            @auth
              <a href="#" @click.prevent="document.getElementById('logout-form').submit();">Logout</a>
            @else
              <a href="{{ route('register.index') }}">Register</a>
              <a href="{{ route('auth.create') }}">Sign In</a>
            @endauth
          @endunless
        </div>
      </div>
    </nav>
  </header>

  <main id="main-content" class="container mx-auto px-4 pt-24 pb-12">
    {{ $slot }}
  </main>

  <footer class="bg-white dark:bg-slate-800 border-t dark:border-slate-700">
    <div class="container mx-auto px-4 py-6 text-sm text-slate-600 dark:text-slate-400">&copy; {{ date('Y') }} Booking.com. All rights reserved.</div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.js"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite(['resources/js/app.js'])
</body>
</html>
