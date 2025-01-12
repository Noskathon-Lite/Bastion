<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const html = document.documentElement;
            const themeToggle = document.querySelector('#theme-toggle');

            // Apply the stored theme preference on load
            if (localStorage.theme === 'dark') {
                html.classList.add('dark');
                themeToggle.checked = true;
            } else {
                html.classList.remove('dark');
            }

            // Add toggle functionality
            themeToggle.addEventListener('change', () => {
                if (themeToggle.checked) {
                    html.classList.add('dark');
                    localStorage.theme = 'dark';
                } else {
                    html.classList.remove('dark');
                    localStorage.theme = 'light';
                }
            });
        });
    </script>

    <style>
        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .toggle-switch {
            width: 50px;
            height: 25px;
            background: #e2e8f0;
            border-radius: 25px;
            position: relative;
            transition: background 0.3s;
        }

        .toggle-switch::before {
            content: '';
            width: 21px;
            height: 21px;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: transform 0.3s;
        }

        input:checked + .toggle-switch {
            background: #4caf50;
        }

        input:checked + .toggle-switch::before {
            transform: translateX(25px);
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <livewire:layout.navigation />

    <!-- Theme Toggle -->
    <div class="flex justify-end p-4">
        <label for="theme-toggle" class="theme-toggle">
            <span class="text-gray-800 dark:text-gray-200">Light</span>
            <input type="checkbox" id="theme-toggle" class="hidden" />
            <div class="toggle-switch"></div>
            <span class="text-gray-800 dark:text-gray-200">Dark</span>
        </label>
    </div>

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
