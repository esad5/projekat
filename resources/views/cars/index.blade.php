<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna - Auta') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-bold">Lista Auta</h1>
                <a href="\add_car" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md shadow-md hover:bg-blue-700">Dodaj Auto</a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-4">
                    @if($cars->isEmpty())
                        <p class="text-center text-gray-500">Trenutno nema dostupnih auta.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naziv</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Godina</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Akcije</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cars as $car)
                                    <tr class="hover:bg-blue-100">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car->year }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                            <form method="POST" action="{{ route('edit_car') }}" class="inline-block">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $car->id }}">
                                                <button type="submit" class="px-3 py-1 bg-green-600 text-white text-sm rounded-md shadow-md hover:bg-green-700">Uredi</button>
                                            </form>
                                            <form method="POST" action="{{ route('delete_car') }}" class="inline-block">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $car->id }}">
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded-md shadow-md hover:bg-red-700">Obriši</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
