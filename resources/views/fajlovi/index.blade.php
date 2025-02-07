<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upravljanje Fajlovima') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-lg font-bold mb-4">Dodaj PDF Fajl</h2>

                @if (session('success'))
                    <p class="text-green-600">{{ session('success') }}</p>
                    <p class="text-sm text-gray-600">Putanja: {{ session('path') }}</p>
                @endif

                <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="file" name="file" accept=".pdf" class="border p-2 w-full">
                    @error('file')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <div class="flex space-x-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Dodaj Fajl
                        </button>
                        <a href="{{ route('files.list') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Pregledaj Fajlove
                        </a>
                    </div>
                </form>
            </div>

            <!-- Dugme za listanje fajlova -->
            <div class="mt-6">
                <a href="{{ route('files.list') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                    Lista svih fajlova
                </a>
            </div>

            <!-- Lista fajlova -->
            <div class="mt-8 bg-white shadow-xl sm:rounded-lg p-6">
                <h2 class="text-lg font-bold mb-4">Svi Fajlovi</h2>
                @if($files->isEmpty())
                    <p class="text-gray-500">Nema dodanih fajlova.</p>
                @else
                    <ul>
                        @foreach($files as $file)
                            <li class="flex justify-between items-center border-b py-2">
                                <span>{{ $file }}</span>
                                <a href="{{ route('files.download', $file) }}" class="bg-gray-500 text-white px-4 py-1 rounded hover:bg-gray-600">
                                    Preuzmi
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
