
<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-6xl mx-auto">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Succès</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-800">Forums</h1>
                    @if(Auth::user()->ref_role == 5)
                        <a href="{{ route('forum.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                      clip-rule="evenodd" />
                            </svg>
                            Créer un forum
                        </a>
                    @endif
                </div>
                <div class="relative mb-6">
                    <input type="text" id="searchInput" placeholder="Rechercher un forum..."
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <svg class="absolute left-3 top-2.5 text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd" />
                    </svg>
                </div>

                @if($forums->isNotEmpty())
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($forums as $forum)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-4">
                                        <h2 class="text-xl font-semibold text-gray-800">{{ $forum->nom }}</h2>
                                        @if(Auth::user()->ref_role == 5)
                                            <span class="text-sm font-medium text-gray-500 bg-gray-100 rounded-full px-3 py-1">ID:
                                                {{ $forum->id }}</span>
                                        @endif
                                    </div>
                                    <p class="text-gray-600 mb-4">Créé par: <span
                                            class="font-medium">{{ $forum->name ?? 'Inconnu' }}</span></p>
                                    <div class="flex justify-between items-center mt-4">
                                        <a href="{{ route('forum.show', $forum->id) }}"
                                           class="text-blue-600 hover:text-blue-800 font-medium flex items-center transition duration-300 ease-in-out">
                                            Voir plus
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                      clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        @if(Auth::user()->ref_role == 5)
                                            <div class="flex space-x-2">
                                                <a href="{{ route('forum.edit', $forum->id) }}"
                                                   class="text-yellow-600 hover:text-yellow-800 transition duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </a>
                                                <form id="delete-form-{{ $forum->id }}"
                                                      action="{{ route('forum.destroy', $forum->id) }}" method="POST"
                                                      class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="text-red-600 hover:text-red-800 transition duration-300 ease-in-out"
                                                            onclick="confirmDelete('delete-form-{{ $forum->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                             fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                  clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                        <h2 class="text-xl font-semibold text-gray-800">Aucun forum trouvé</h2>
                    </div>
                @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(formId) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
        document.getElementById('searchInput').addEventListener('input', function () {
            var searchTerm = this.value.toLowerCase();
            var forumCards = document.querySelectorAll('.grid > div');
            forumCards.forEach(function (card) {
                var name = card.querySelector('h2').textContent.toLowerCase();
                var createdBy = card.querySelector('p').textContent.toLowerCase();
                if (name.includes(searchTerm) || createdBy.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
