<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rewahan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
  <!---      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
-->
        <!-- Styles -->
        @vite(['resources/js/app.js'])
        @vite('resources/css/stylewelcome.css')
         <!-- Link the CSS file -->

    </head>
    <body >
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                        </div>
                       
                    </header>

                    <main class="mt-6">
                    <div class="container"> 
        <!-- Header Section -->
        <header class="header" id="home">

            <div class="logo">  <a href="index.html">Rewahan</a>
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
                <li><a href="" onclick="scrolltosection('section1')">VEHICELES</a></li>
                <li><a href="" onclick="scrolltosection('section2')" >WHYUS</a></li>
                <li><a href="" > @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif</a></li>
            </ul>
        </nav>

</header>
<div class="img-context">
    <p>"Your Next Escape Starts Here!
        </p><div id="nextline">Your Perfect Vehicle with</div>  <div class="rawahan">Rewahn</div>

</div><img class="img" src="{{ asset('storage/Images/home/welcome.jpg') }}" alt="Image">
        <!-- vehicle Listing Section -->
      
      
      
        <section class="vehicle-listing" id="">
            <h1 class="section-title">Available Vehicles</h1>
            <div class="vehicle-cards" id="section1">
                <!-- vehicle Card 1 -->
                <div class="vehicle-card">
                    <img src="{{ asset('storage/Images/home/car.png') }}" alt="Vehicle" class="vehicle-image">
                    <h3 class="vehicle-name">SUV Car</h3>
                    <p class="vehicle-price">$50/day</p>
                    <button class="rent-button">Rent Now</button>
                </div>

                <!-- vehicle Card 2 -->
                <div class="vehicle-card">
                    <img src="{{ asset('storage/Images/home/truck.png') }}" alt="Vehicle" class="vehicle-image">
                    <h3 class="vehicle-name">Truck</h3>
                    <p class="vehicle-price">$80/day</p>
                    <button class="rent-button">Rent Now</button>
                </div>

                <!-- vehicle Card 3 -->
                <div class="vehicle-card">
                    <img src="{{ asset('storage/Images/home/bike v2.png') }}" alt="Vehicle" class="vehicle-image">
                    <h3 class="vehicle-name">Motorbike</h3>
                    <p class="vehicle-price">$30/day</p>
                    <button class="rent-button">Rent Now</button>
                </div>
            </div>
        </section>

      <!-- features Section -->
      <section class="features" id="section2">
    <h2 class="section-title">WHY US!</h2>

    <div class="features2">
        <img class="whyus" src="{{ asset('storage/Images/home/whyus.png') }}" >
        <div class="features-text-overlay">
            <ul class="features-list">
                <li><strong>Verified Users:</strong> KYC ensures safe and reliable transactions.</li>
                <li>Clear damage reports, fair pricing, and detailed legal agreements.</li>
                <li>Flexible and privacy-conscious tracking with geofencing for added security.</li>
                <li>An intuitive interface for smooth communication and hassle-free rentals.</li>
                <li>Built with Laravel and Livewire for performance and reliability, with a mobile app in the pipeline.</li>
            </ul>
        </div>
    </div>
</section>

    </div>
                    </main>



                    
                    <footer>
        <div class="container2">
            <div class="footer-sections">
                <!-- About Us Section -->
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>
                        "Established in 2025, [Your Company Name] is Nepal's newest and most 
                        innovative vehicle rental platform. With a fresh approach to convenience
                         and trust, we connect vehicle owners and renters, ensuring seamless and 
                         affordable rentals that redefine travel experiences across Nepal
                    </p>
                </div>
                <!-- Contact Info Section -->
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p>
                        <strong>Address:</strong> balkumari, lalitpur Nepal<br>
                        <strong>Phone:</strong> 01-751238, 9875512364<br>
                        <strong>Email:</strong> <a href="mailto:info@rewahn.com">info@rewahn.com</a>
                    </p>
                </div>
                <!-- Quick Links Section -->
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">RENT</a></li>
                        <li><a href="#">FEATURES</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p>Copyright 2025 - Rewahan | <a href="#">Privacy Policy</a></p>
            </div>
        </div>
    </footer>



                </div>
            </div>
        </div>

        <script>
    function scrolltosection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        } else {
            console.error(`Section with ID '${sectionId}' not found.`);
        }
    }
</script>
    </body>
</html>
