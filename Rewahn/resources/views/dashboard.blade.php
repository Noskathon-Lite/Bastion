<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a
                    href="{{ route('vehicle.create') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md shadow focus:outline-none focus:ring focus:ring-green-300">
                    Create Vehicle
                </a>
            </div>

            <div class="mt-8">
                <livewire:personal-vehicle-listing />
            </div>
        </div>
    </div>
</x-app-layout>
