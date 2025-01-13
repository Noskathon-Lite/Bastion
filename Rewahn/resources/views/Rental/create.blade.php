<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('vehicle Rent Form') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <livewire:forms.rental-form :vehicle_id=1 />
    </div>

</x-app-layout>

