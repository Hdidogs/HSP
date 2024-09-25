<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evenement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Evenement
                    </div>
                    <div class="mt-6 text-gray-500">
                        <a href="{{ route('evenement.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un evenement</a>
                    </div>
                    <div class="mt-6">
                        <form method="POST" action="{{ route('evenement.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="titre" class="sr-only">Titre</label>
                                <input type="text" name="titre" id="titre" placeholder="Titre" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('titre') border-red-500 @enderror" value="{{ old('titre') }}">
                                @error('titre')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="sr-only">Description</label>
                                <input type="text" name="description" id="description" placeholder="Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" value="{{ old('description') }}">
                                @error('description')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="date" class="sr-only">Date</label>
                                <input type="date" name="date" id="date" placeholder="Date" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror" value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
