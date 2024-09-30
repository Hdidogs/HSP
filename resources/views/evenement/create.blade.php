<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Événement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Ajouter un Événement
                    </div>

                    <form method="POST" action="{{ route('evenement.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="type" class="sr-only">Type</label>
                            <input type="text" name="type" id="type" placeholder="Type" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('type') border-red-500 @enderror" value="{{ old('type') }}">
                            @error('type')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
                            <label for="adresse" class="sr-only">Adresse</label>
                            <input type="text" name="adresse" id="adresse" placeholder="Adresse" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('adresse') border-red-500 @enderror" value="{{ old('adresse') }}">
                            @error('adresse')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="elementrequis" class="sr-only">Élément requis</label>
                            <input type="text" name="elementrequis" id="elementrequis" placeholder="Élément requis" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('elementrequis') border-red-500 @enderror" value="{{ old('elementrequis') }}">
                            @error('elementrequis')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nb_place" class="sr-only">Nombre de places</label>
                            <input type="number" name="nb_place" id="nb_place" placeholder="Nombre de places" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('nb_place') border-red-500 @enderror" value="{{ old('nb_place') }}">
                            @error('nb_place')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer l'événement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
