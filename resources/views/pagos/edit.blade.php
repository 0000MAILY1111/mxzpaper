<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{-- <span>{{ __('Editar $usuario -> name ') }}</span> --}}
            {{-- Editar Usuario {{$usuario -> name}} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('editar-pago', ['pago' => $pago])
            </div>
        </div>
    </div>
</x-app-layout>

