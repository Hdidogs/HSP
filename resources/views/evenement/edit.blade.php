<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l Événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Modifier l'Événement
                    </div>

                    <form method="POST" action="{{ route('evenement.update', $evenement) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="type" class="sr-only">Type</label>
                            <input type="text" name="type" id="type" placeholder="Type"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('type') border-red-500 @enderror"
                                value="{{ old('type', $evenement->type) }}">
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
                                value="{{ old('titre', $evenement->titre) }}">
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
                                rows="4">{{ old('desc', $evenement->desc) }}</textarea>
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
                                value="{{ old('nb_place', $evenement->nb_place) }}" min="0">
                            @error('nb_place')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date" class="sr-only">Date et Heure</label>
                            <input type="datetime-local" name="date" id="date"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror"
                                value="{{ old('date', $evenement->date) }}">
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
                                Modifier l'événement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>