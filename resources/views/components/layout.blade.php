<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking.com | Hotels and More</title>
    
    <!-- Fonts & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Datepicker Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">
    <!-- Header -->
    <header class="bg-white shadow-sm fixed w-full top-0 z-50">
        <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <a href="/" class="flex items-center">
                    <span class="text-blue-600 text-2xl font-bold">booking.com</span>
                </a>
                <div class="hidden md:flex items-center space-x-4">
                    <button class="flex items-center text-slate-700 hover:text-blue-600">
                        <i class="fa-solid fa-globe mr-2"></i>
                        <span>English (US)</span>
                    </button>
                    <button class="flex items-center text-slate-700 hover:text-blue-600">
                        <i class="fa-solid fa-dollar-sign mr-2"></i>
                        <span>USD</span>
                    </button>
                    <a href="/pick_a_property?" class="text-slate-700 hover:text-blue-600">List your property</a>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="hidden md:block bg-blue-100 text-blue-800 px-4 py-2 rounded-full hover:bg-blue-200">
                    <i class="fa-solid fa-circle-question mr-2"></i>Help
                </button>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700">
                    Sign in
                </a>
                <button class="md:hidden text-slate-700">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 pt-24 pb-12">
        {{$slot}}
    </main>

    <!-- Footer (You can add later) -->
</body>
</html>