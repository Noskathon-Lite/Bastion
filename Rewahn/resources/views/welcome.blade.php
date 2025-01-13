<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rewahn</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
  <!---      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
-->
        <!-- Styles -->
        @vite(['resources/js/app.js'])
        @vite('resources/css/stylewelcome.css')
         <!-- Link the CSS file -->

    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                        </div>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>

                    <main class="mt-6">
                    <div class="container">
        <!-- header  -->
        <!-- Header Section -->
        <header class="header" id="home">

            <div class="logo">  <a href="index.html">Rewahn</a>
                <p>embrace the Road, your Way</p></div>
        </a>


            <div class="search-bar">
                <input type="text" placeholder="Search for vehicles..." class="search-input">
                <button class="search-button">Search</button>
            </div>
         <!-- Navigation Menu -->
        <nav class="navbar">

            <ul class="menu">
                <li><a href="#home" >HOME</a></li>
                <li><a href="#rent" >RENT</a></li>
                <li><a href="#features" >FEATURES</a></li>
                <li><a href="support">SUPPORT US</a></li>
            </ul>
        </nav>

</header>
<div class="img-context">
    <p>"Your Next Escape Starts Here!
        </p><div id="nextline">Your Perfect Vehicle with</div>  <div class="rawahn">Rewahn</div>

</div><img src="{{ asset('storage/' . 'Images/home/ed-259-270914-unsplash.jpg') }}" alt="Image">
        <!-- vehicle Listing Section -->
        <section class="vehicle-listing" id="rent">
            <h1 class="section-title">Available Vehicles</h1>
            <div class="vehicle-cards">
                <!-- vehicle Card 1 -->
                <div class="vehicle-card">
                    <img src="../../storage/app/public/Images/home/car-removebg-preview.png" alt="Vehicle" class="vehicle-image">
                    <h3 class="vehicle-name">SUV Car</h3>
                    <p class="vehicle-price">$50/day</p>
                    <button class="rent-button">Rent Now</button>
                </div>

                <!-- vehicle Card 2 -->
                <div class="vehicle-card">
                    <img src="../../storage/app/public/Images/home/truck-removebg-preview.png" alt="Vehicle" class="vehicle-image">
                    <h3 class="vehicle-name">Truck</h3>
                    <p class="vehicle-price">$80/day</p>
                    <button class="rent-button">Rent Now</button>
                </div>

                <!-- vehicle Card 3 -->
                <div class="vehicle-card">
                    <img src="../../storage/app/public/Images/home/bike-removebg-preview.png" alt="Vehicle" class="vehicle-image">
                    <h3 class="vehicle-name">Motorbike</h3>
                    <p class="vehicle-price">$30/day</p>
                    <button class="rent-button">Rent Now</button>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services" id="services">
            <h2 class="section-title">Our Services</h2>
            <p class="services-description">
                We provide the best rental services for vehicles with flexible pricing, GPS tracking, and secure agreements to ensure a hassle-free experience.
            </p>
        </section>
    </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
