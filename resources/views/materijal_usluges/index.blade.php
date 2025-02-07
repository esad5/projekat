<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-blue-500 text-white p-4 rounded-md shadow">
            {{ __('Materijali i Usluge') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <!-- Dropdown za Materijale za uslugu -->
                <div x-data="{ open: false }" class="bg-blue-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-blue-800 cursor-pointer">
                        Materijali za uslugu
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-blue-200 my-4" />
                    <div x-show="open" x-cloak>
                        @if($materijali->isEmpty())
                            <p class="text-gray-700">Nema materijala za ovu uslugu.</p>
                        @else
                            <table class="w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 border">Materijal</th>
                                        <th class="px-4 py-2 border">Cijena</th>
                                        <th class="px-4 py-2 border">Količina</th>
                                        <th class="px-4 py-2 border">Ukupna Cijena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materijali as $materijal)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $materijal->name }}</td>
                                            <td class="px-4 py-2 border">{{ number_format($materijal->price, 2) }} KM</td>
                                            <td class="px-4 py-2 border">{{ $materijal->kolicina }}</td>
                                            <td class="px-4 py-2 border">{{ number_format($materijal->price * $materijal->kolicina, 2) }} KM</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <!-- Dropdown za Materijale sa cijenom većom od 20 -->
                <div x-data="{ open: false }" class="bg-green-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-green-800 cursor-pointer">
                        Materijali sa cijenom većom od 20 KM
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-green-200 my-4" />
                    <div x-show="open" x-cloak>
                        @if($materijali_sa_vecom_cijenom->isEmpty())
                            <p class="text-gray-700">Nema materijala sa cijenom većom od 20 KM.</p>
                        @else
                            <table class="w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 border">Materijal</th>
                                        <th class="px-4 py-2 border">Cijena</th>
                                        <th class="px-4 py-2 border">Količina</th>
                                        <th class="px-4 py-2 border">Ukupna Cijena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materijali_sa_vecom_cijenom as $materijal)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $materijal->name }}</td>
                                            <td class="px-4 py-2 border">{{ number_format($materijal->price, 2) }} KM</td>
                                            <td class="px-4 py-2 border">{{ $materijal->kolicina }}</td>
                                            <td class="px-4 py-2 border">{{ number_format($materijal->price * $materijal->kolicina, 2) }} KM</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <!-- Dropdown za Sve usluge, materijale i kolicinu  -->
                <div x-data="{ open: false }" class="bg-yellow-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-yellow-800 cursor-pointer">
                        Sve usluge, materijali i kolicina
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-yellow-200 my-4" />
                    <div x-show="open" x-cloak>
                        @if($usluga_materials->isEmpty())
                            <p class="text-gray-700">Nema podataka o uslugama i materijalima.</p>
                        @else
                            <table class="w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 border">Kod Usluge</th>
                                        <th class="px-4 py-2 border">Materijal</th>
                                        <th class="px-4 py-2 border">Količina</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usluga_materials as $item)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $item->code }}</td>
                                            <td class="px-4 py-2 border">{{ $item->material_name }}</td>
                                            <td class="px-4 py-2 border">{{ $item->kolicina }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <!-- Dropdown za Auta i njihove usluge -->
                <div x-data="{ open: false }" class="bg-red-50 p-6 rounded-md shadow">
                    <h1 @click="open = !open" class="text-lg font-semibold text-red-800 cursor-pointer">
                        Auta i njihove usluge sa ocjenama
                        <span x-text="open ? '▲' : '▼'" class="ml-2 text-sm"></span>
                    </h1>
                    <hr class="border-red-200 my-4" />
                    <div x-show="open" x-cloak>
                        @if($cars_services->isEmpty())
                            <p class="text-gray-700">Nema podataka o autima i uslugama.</p>
                        @else
                            <table class="w-full table-auto border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 border">Naziv Auta</th>
                                        <th class="px-4 py-2 border">Kod Usluge</th>
                                        <th class="px-4 py-2 border">Ocjena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cars_services as $service)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $service->car_name }}</td>
                                            <td class="px-4 py-2 border">{{ $service->code }}</td>
                                            <td class="px-4 py-2 border">{{ $service->grade }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
