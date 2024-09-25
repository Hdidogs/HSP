<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('offre.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une offre</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($offres->count())
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Titre</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Date de création</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $offre)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $offre->titre }}</td>
                                        <td class="border px-4 py-2">{{ $offre->description }}</td>
                                        <td class="border px-4 py-2">{{ $offre->created_at->format('d/m/Y') }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('offre.edit', $offre) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</a>
                                            <form action="{{ route('offre.destroy', $offre) }}" method="POST" class="inline">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Aucune offre pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
