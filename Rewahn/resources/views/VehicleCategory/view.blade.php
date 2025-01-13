<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Vehicle Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Categories -->
        <div class="container mx-auto">
            <h3 class="text-2xl font-bold mb-4">Vehicle Categories</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <div class="card bg-white shadow-md rounded-lg p-4">
                        <h4 class="text-xl font-semibold">{{ $category->name }}</h4>
                        <p><strong>Minimum Price:</strong> ${{ number_format($category->min_price, 2) }}</p>
                        <p><strong>Maximum Price:</strong> ${{ number_format($category->max_price, 2) }}</p>

                        <a href="{{ route('vehicle.viewall', $category->id) }}" class="btn btn-primary mt-4">View Vehicles</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
