<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-6xl mx-auto">
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Erreur</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Succès</p>
                    <p>{{ session('status') }}</p>
                </div>
            @endif
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">Événements</h1>
                @if(Auth::user()->ref_role == 3 || Auth::user()->ref_role == 4)
                    <a href="{{ route('evenement.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd"/>
                        </svg>
                        Créer un événement
                    </a>
                @endif
            </div>
            <div class="relative mb-6">
                <input type="text" id="searchInput" placeholder="Rechercher un événement..."
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                <svg class="absolute left-3 top-2.5 text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"/>
                </svg>
            </div>
            @if($evenements->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($evenements as $evenement)
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg flex flex-col">
                            <div class="flex-grow p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h2 class="text-xl font-semibold text-gray-800">{{ $evenement->titre }}</h2>
                                    <span class="text-sm font-medium text-gray-500 bg-gray-100 rounded-full px-3 py-1">
                                        {{ $evenement->type }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4">{{ Str::limit($evenement->description, 100) }}</p>
                                <div class="space-y-2 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <svg class="mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y H:i') }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                        {{ $evenement->adresse }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                        </svg>
                                        Requis : {{ $evenement->elementrequis }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                        {{ $evenement->nb_place }} place(s) restante(s)
                                    </div>
                                </div>
                            </div>
                            <div class="mt-auto p-6 pt-0">
                                <div class="flex justify-between items-center">
                                    <div class="flex space-x-2">
                                        @if(Auth::user()->ref_role == 3 || Auth::user()->ref_role == 4)
                                            <a href="{{ route('evenement.edit', $evenement->id) }}"
                                                class="text-yellow-600 hover:text-yellow-800 transition duration-300 ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <button type="button"
                                                class="text-red-600 hover:text-red-800 transition duration-300 ease-in-out"
                                                onclick="confirmDelete({{ $evenement->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('evenement.show', $evenement) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                                            Voir plus
                                        </a>
                                        @if(\Carbon\Carbon::parse($evenement->date)->subDay() < now())
                                            <span class="bg-gray-500 text-white font-bold py-2 px-4 rounded opacity-75">
                                                Clôturé
                                            </span>
                                        @else
                                            @if(!$evenement->isCreator)
                                                @if($evenement->isUserInscrit(Auth::id()))
                                                    <button onclick="confirmDesinscription({{ $evenement->id }})"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                                                        Se désinscrire
                                                    </button>
                                                @else
                                                    <button onclick="confirmInscription({{ $evenement->id }})"
                                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                                                        {{ $evenement->nb_place <= 0 ? 'disabled' : '' }}>
                                                        {{ $evenement->nb_place <= 0 ? 'Complet' : 'S\'inscrire' }}
                                                    </button>
                                                @endif
                                            @else
                                                <a href="{{ route('evenement.inscrits', $evenement) }}"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                                                    Voir les inscrits
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Aucun événement trouvé</h2>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        function confirmDelete(evenementId) {
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
                    document.getElementById('delete-form-' + evenementId).submit();
                }
            });
        }

        function confirmInscription(evenementId) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Voulez-vous vous inscrire à cet événement ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, inscrire !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('inscription-form-' + evenementId).submit();
                }
            });
        }

        function confirmDesinscription(evenementId) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Voulez-vous vous désinscrire de cet événement ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, désinscrire !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('desinscription-form-' + evenementId).submit();
                }
            });
        }

        document.getElementById('searchInput').addEventListener('input', function () {
            var searchTerm = this.value.toLowerCase();
            var eventCards = document.querySelectorAll('.grid > div');
            eventCards.forEach(function (card) {
                var title = card.querySelector('h2').textContent.toLowerCase();
                var description = card.querySelector('p').textContent.toLowerCase();
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

    </script>

    @foreach($evenements as $evenement)
        <form id="delete-form-{{ $evenement->id }}" action="{{ route('evenement.destroy', $evenement) }}" method="POST"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <form id="inscription-form-{{ $evenement->id }}" action="{{ route('evenement.inscription', $evenement) }}"
            method="POST" style="display: none;">
            @csrf
        </form>
        <form id="desinscription-form-{{ $evenement->id }}" action="{{ route('evenement.desinscription', $evenement) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
</x-app-layout>
