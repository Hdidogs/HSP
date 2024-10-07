<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle activité') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('activite.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="type" class="sr-only">Type</label>
                        <input type="text" name="type" id="type" placeholder="Type"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('type') border-red-500 @enderror"
                            value="{{ old('type') }}">
                        @error('type')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="titre" class="sr-only">Titre</label>
                        <input type="text" name="titre" id="titre" placeholder="Titre"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('titre') border-red-500 @enderror"
                            value="{{ old('titre') }}">
                        @error('titre')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="desc" class="sr-only">Description</label>
                        <textarea name="desc" id="desc" placeholder="Description"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('desc') border-red-500 @enderror"
                            rows="4">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nb_place" class="sr-only">Nombre de places</label>
                        <input type="number" name="nb_place" id="nb_place" placeholder="Nombre de places"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('nb_place') border-red-500 @enderror"
                            value="{{ old('nb_place') }}" min="1">
                        @error('nb_place')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="date" class="sr-only">Date et Heure</label>
                        <input type="datetime-local" name="date" id="date" placeholder="Date et Heure"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror"
                            value="{{ old('date') }}">
                        @error('date')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Créer l'activité
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>