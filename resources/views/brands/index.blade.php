<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-blue-200 p-4 rounded-md shadow">
            {{ __('Pocetna-Brendovi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-blue-600 mb-4">Lista Auta</h3>

                @foreach($brands as $brand)
                    <p class="p-2 bg-gray-50 border-b border-gray-200 hover:bg-blue-100 transition duration-300">
                        <span class="font-bold text-gray-700">{{$loop->iteration}}.</span>
                        <span class="text-gray-900">{{$brand->name}}</span> - 
                        <span class="text-gray-600 italic">{{$brand->country}}</span>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
