<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Auta-Uredi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($cars as $car)
                    <form method="POST" action="{{ route('update_car') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$car->id}}"/>

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Naziv') }}</label>
                            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" 
                                   type="text" name="name" value="{{$car->name}}" required autofocus />
                        </div> 

                        <div class="mt-4">
                            <label for="year" class="block font-medium text-sm text-gray-700">{{ __('Godina') }}</label>
                            <input id="year" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" 
                                   type="date" name="year" value="{{$car->year}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="engine" class="block font-medium text-sm text-gray-700">{{ __('Motor') }}</label>
                            <input id="engine" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" 
                                   type="text" name="engine" value="{{$car->engine}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="code" class="block font-medium text-sm text-gray-700">{{ __('Šifra') }}</label>
                            <input id="code" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" 
                                   type="number" name="code" value="{{$car->code}}" required autofocus />
                        </div> 

                        <div class="mt-4">
                            <label for="brand" class="block font-medium text-sm text-gray-700">{{ __('Brend') }}</label>
                            <select id="brand" name="brand" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                <option>Odaberi</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" 
                                @if($car->brand == $brand->id) selected 
                                @endif>{{$brand->name}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                {{ __('Spremi') }}
                            </button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
