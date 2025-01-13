<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('vehicle Category Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <livewire:forms.vehicle-category-form />
    </div>
    <div class="py-4">
        <a href="{{ route('vehicle-category.viewall') }}" class="btn btn-primary">
            Go to Category View
        </a>
    </div>
</x-app-layout>

