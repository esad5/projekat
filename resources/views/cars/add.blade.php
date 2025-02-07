<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_car" class="m-2 p-2 text-xl">Dodaj auto</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form method="POST" action="{{ route('store_car') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Ime') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="year" value="{{ __('Godina') }}" />
                <x-input id="year" class="block mt-1 w-full" type="date" name="year" :value="old('year')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="engine" value="{{ __('Motor') }}" />
                <x-input id="engine" class="block mt-1 w-full" type="number" name="engine" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="code" value="{{ __('Code') }}" />
                <x-input id="code" class="block mt-1 w-full" type="number" name="code" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="air_condition" value="{{ __('Air Condition') }}" />
                <x-input id="air_condition" class="block mt-1 w-full" type="number" name="air_condition" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="brand" value="{{ __('Brand') }}" />
                <select id="brand" name= "brand" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                    <option selected="true" disabled="disabled">Odaberi</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}"> {{$brand->name}}</option>
                    @endforeach
</select>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ms-4">
                    {{ __('Spremi') }}
                </x-button>
            </div>
        </form>
            </div>
        </div>
    </div>
</x-app-layout>