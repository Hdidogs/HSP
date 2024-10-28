<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Forums</h1>
            <a href="{{ route('forum.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                Créer un forum
            </a>
        </div>

        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Rechercher un forum..."
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($forums as $forum)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <p class="text-sm text-gray-500 mb-1">ID: {{ $forum->id }}</p>
                        <h2 class="text-xl font-semibold mb-2">{{ $forum->nom }}</h2>
                        <p class="text-gray-600 mb-4">Créé par: {{ $forum->created_by ?? $forum->user->name ?? 'Inconnu' }}
                        </p>
                        <div class="flex justify-between space-x-2">
                            <a href="{{ route('forum.show', $forum) }}"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out flex-grow text-center">
                                Voir plus
                            </a>
                            <a href="{{ route('forum.edit', $forum) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out flex-grow text-center">
                                Modifier
                            </a>
                            <form action="{{ route('forum.destroy', $forum) }}" method="POST"
                                class="inline-block flex-grow">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce forum ?')">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            var searchTerm = this.value.toLowerCase();
            var forumCards = document.querySelectorAll('.grid > div');

            forumCards.forEach(function (card) {
                var name = card.querySelector('h2').textContent.toLowerCase();
                var createdBy = card.querySelector('p:nth-child(3)').textContent.toLowerCase();
                if (name.includes(searchTerm) || createdBy.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>