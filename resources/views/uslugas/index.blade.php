<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-blue-500 text-white p-4 rounded-md shadow">
            {{ __('Početna - Brendovi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <!-- Dropdown za Upit 1 -->
                <div x-data="{ open: false }" class="bg-blue-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-blue-800 cursor-pointer">
                        Upit 1. Broj usluga između određenog intervala
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-blue-200 my-4" />
                    <div x-show="open" x-cloak>
                        <p class="text-gray-700 text-lg">{{ $number_of_uslugas }}</p>
                    </div>
                </div>

                <!-- Dropdown za Upit 2 -->
                <div x-data="{ open: false }" class="bg-green-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-green-800 cursor-pointer">
                        Upit 2. Detalji usluga
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-green-200 my-4" />
                    <div x-show="open" x-cloak>
                        @foreach($services as $service)
                            <div class="mb-4 p-4 bg-white rounded-md shadow">
                                <p><span class="font-bold text-gray-800">Code:</span> {{ $service->code }}</p>
                                <p><span class="font-bold text-gray-800">Majstor:</span> {{ $service->majstor_name }}</p>
                                <p><span class="font-bold text-gray-800">Level:</span> {{ $service->level }}</p>
                                <p><span class="font-bold text-gray-800">Date:</span> {{ $service->date }}</p>
                                <p><span class="font-bold text-gray-800">Description:</span> {{ $service->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Dropdown za Upit 3 -->
                <div x-data="{ open: false }" class="bg-yellow-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-yellow-800 cursor-pointer">
                        Upit 3. Najaktivniji majstor
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-yellow-200 my-4" />
                    <div x-show="open" x-cloak>
                        @if($most_active_majstor)
                            <div class="p-4 bg-white rounded-md shadow">
                                <p><span class="font-bold text-gray-800">Ime:</span> {{ $most_active_majstor->name }}</p>
                                <p><span class="font-bold text-gray-800">Level:</span> {{ $most_active_majstor->level }}</p>
                                <p><span class="font-bold text-gray-800">Opis:</span> {{ $most_active_majstor->description }}</p>
                                <p><span class="font-bold text-gray-800">Broj usluga:</span> {{ $most_active_majstor->brojac }}</p>
                            </div>
                        @else
                            <p class="text-gray-700">Nema dostupnih podataka o majstorima.</p>
                        @endif
                    </div>
                </div>

                <!-- Dropdown za Upit 4 - Najbolje ocijenjeni majstori -->
                <div x-data="{ open: false }" class="bg-purple-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-purple-800 cursor-pointer">
                        Upit 4. Najbolje ocijenjeni majstori i automobili
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-purple-200 my-4" />
                    <div x-show="open" x-cloak>
                        @foreach($best_rated_majstors as $majstor)
                            <div class="mb-4 p-4 bg-white rounded-md shadow">
                                <p><span class="font-bold text-gray-800">Majstor:</span> {{ $majstor->majstor_name }}</p>
                                <p><span class="font-bold text-gray-800">Level:</span> {{ $majstor->level }}</p>
                                <p><span class="font-bold text-gray-800">Opis:</span> {{ $majstor->description }}</p>
                                <p><span class="font-bold text-gray-800">Automobil:</span> {{ $majstor->car_name }}</p>
                                <p><span class="font-bold text-gray-800">Prosječna ocjena:</span> {{ number_format($majstor->average_grade, 2) }}</p>
                            </div>
                        @endforeach
                    </div>

                    
                </div>

                <div x-data="{ open: false }" class="bg-red-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-red-800 cursor-pointer">
                        Upit 5. Prikaz svih brendova
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-red-200 my-4" />
                    <div x-show="open" x-cloak>
                        @foreach($brands as $brand)
                            <div class="mb-4 p-4 bg-white rounded-md shadow">
                                <p><span class="font-bold text-gray-800">Naziv:</span> {{ $brand->name }}</p>
                                <p><span class="font-bold text-gray-800">Zemlja:</span> {{ $brand->country }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                 <!-- Prikaz svih majstora sa nivoima -->
                 <div x-data="{ open: false }" class="bg-indigo-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-indigo-800 cursor-pointer">
                        Upit 6. Prikaz svih majstora sa nivoima
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-indigo-200 my-4" />
                    <div x-show="open" x-cloak>
                        @foreach($majstors as $majstor)
                            <div class="mb-4 p-4 bg-white rounded-md shadow">
                                <p><span class="font-bold text-gray-800">Ime:</span> {{ $majstor->name }}</p>
                                <p><span class="font-bold text-gray-800">Nivo:</span> {{ $majstor->level }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</x-app-layout>
