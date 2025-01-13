<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('vehicle Edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <livewire:forms.vehicle-form-edit :id="$id"/>
    </div>

</x-app-layout>

