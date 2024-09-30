<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier une entreprise
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ $entreprise->nom }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="adresseWeb" class="block text gray-700 text-sm font-bold mb-2">AdresseWeb</label>
                        <input type="text" name="adresseWeb" id="adresseWeb" value="{{ $entreprise->adresseWeb }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="numero" class="block text-gray-700 text-sm font-bold mb-2">Numero</label>
                        <input type="text" name="numero" id="numero" value="{{ $entreprise->numero }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <button type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
