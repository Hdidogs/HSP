<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offres d\'emploi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('offre.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Créer une nouvelle offre</a>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($offres as $offre)
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-xl font-semibold mb-2">{{ $offre->titre }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit($offre->description, 100) }}</p>
                            <p class="text-gray-600 mb-2">Mission : {{ Str::limit($offre->mission, 100) }}</p>
                            @if($offre->salaire)
                                <p class="text-gray-600 mb-2">Salaire : {{ number_format($offre->salaire, 2) }} €</p>
                            @endif
                            <a href="{{ route('offre.show', $offre) }}" class="text-blue-500 hover:text-blue-700">Voir plus</a>
                            <a href="{{ route('offre.edit', $offre) }}" class="text-green-500 hover:text-green-700 ml-2">Modifier</a>
                            <form action="{{ route('offre.destroy', $offre) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">Supprimer</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
