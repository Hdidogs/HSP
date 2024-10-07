<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Événements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Liste des événements
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('evenement.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un
                            événement</a>
                    </div>

                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Type</th>
                                <th class="border px-4 py-2">Titre</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Adresse</th>
                                <th class="border px-4 py-2">Élément requis</th>
                                <th class="border px-4 py-2">Nombre de places</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evenements as $evenement)
                                <tr>
                                    <td class="border px-4 py-2">{{ $evenement->type }}</td>
                                    <td class="border px-4 py-2">{{ $evenement->titre }}</td>
                                    <td class="border px-4 py-2">{{ $evenement->description }}</td>
                                    <td class="border px-4 py-2">{{ $evenement->adresse }}</td>
                                    <td class="border px-4 py-2">{{ $evenement->elementrequis }}</td>
                                    <td class="border px-4 py-2">{{ $evenement->nb_place }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('evenement.edit', $evenement) }}"
                                            class="text-blue-500">Modifier</a>
                                        <form action="{{ route('evenement.destroy', $evenement) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>