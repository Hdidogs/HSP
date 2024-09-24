<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des entreprises
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Nom</th>
                            <th class="border px-4 py-2">Adresse</th>
                            <th class="border px-4 py-2">Numero</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entreprises as $entreprise)
                            <tr>
                                <td class="border px-4 py-2">{{ $entreprise->nom }}</td>
                                <td class="border px-4 py-2">{{ $entreprise->adresse }}</td>
                                <td class="border px-4 py-2">{{ $entreprise->numero }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('entreprise.show', $entreprise->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir</a>
                                    <a href="{{ route('entreprise.edit', $entreprise->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Modifier</a>
                    <form action="{{ route('entreprise.destroy', $entreprise->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('entreprise.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter une entreprise</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
