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
                <form action="{{ route('offre.postuler', $offre) }}" method="GET">
                    @csrf
                    <button type="submit" class="mt-4 inline-block bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                        Postuler
                    </button>
                </form>
                <a href="{{ route('offre.index') }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Retour aux offres</a>
            </div>
        </div>
    </div>
</x-app-layout>
