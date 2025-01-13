<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Vehicle Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Categories -->
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold mb-6 text-gray-700 dark:text-gray-100">Vehicle Categories</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-200 mb-2">{{ $category->name }}</h4>
                        <p class="text-gray-700 dark:text-gray-400">
                            <strong>Minimum Price:</strong> ${{ number_format($category->min_price, 2) }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-400 mb-4">
                            <strong>Maximum Price:</strong> ${{ number_format($category->max_price, 2) }}
                        </p>

                        <a href="{{ route('vehicle.index', $category->id) }}"
                           class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500">
                            View Vehicles
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
