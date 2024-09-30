<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $offre->titre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2">Description</h3>
                <p class="text-gray-600 mb-4">{{ $offre->description }}</p>

                <h3 class="text-lg font-semibold mb-2">Mission</h3>
                <p class="text-gray-600 mb-4">{{ $offre->mission }}</p>

                @if($offre->salaire)
                    <p class="text-gray-600 mb-2">Salaire : {{ number_format($offre->salaire, 2) }} €</p>
                @endif

                <div class="mt-4">
                    <a href="{{ route('offre.edit', $offre) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Modifier</a>
                    <form action="{{ route('offre.destroy', $offre) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">Supprimer</button>
                    </form>
                </div>

                <a href="{{ route('offre.index') }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Retour aux offres</a>
            </div>
        </div>
    </div>
</x-app-layout>
