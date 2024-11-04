<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Offres d'emploi</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="relative mb-6">
                <input type="text" id="searchInput" placeholder="Rechercher une offre..."
                       class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                <svg class="absolute left-3 top-2.5 text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                          clip-rule="evenodd" />
                </svg>
            </div>

            @if($offres->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($offres as $offre)
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold mb-2">{{ $offre->titre }}</h2>
                                <p class="text-gray-600 mb-4">{{ Str::limit($offre->description, 100) }}</p>
                                @if($offre->salaire)
                                    <p class="text-gray-800 font-semibold mb-4">Salaire : {{ number_format($offre->salaire, 2) }} €</p>
                                @endif
                                <div class="flex justify-between items-center">
                                    @if(Auth::user()->id == $offre->ref_user)
                                        <button id="cloturerButton-{{ $offre->id }}"
                                                class="px-4 py-2 border rounded-md {{ $offre->closed ? 'bg-red-500 text-white' : 'bg-white text-gray-800' }} hover:bg-opacity-75"
                                                data-offre-id="{{ $offre->id }}">
                                            {{ $offre->closed ? 'Cloturée' : 'Clôturer' }}
                                        </button>
                                    @elseif($offre->closed)
                                        <span class="text-red-500">Cloturée</span>
                                    @endif
                                    <div class="flex space-x-2">
                                        <a href="{{ route('offre.show', $offre) }}" class="text-gray-500 hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        @if(Auth::user()->id == $offre->ref_user)
                                            <a href="{{ route('offre.edit', $offre) }}" class="text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <form id="delete-form-{{ $offre->id }}" action="{{ route('offre.destroy', $offre) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete('delete-form-{{ $offre->id }}')" class="text-gray-500 hover:text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                    <p class="text-gray-600">Aucune offre d'emploi pour le moment.</p>
                </div>
            @endif

            @if(Auth::user()->ref_role == 3 || Auth::user()->ref_role == 4)
                <div class="mt-8 flex justify-end">
                    <a href="{{ route('offre.create') }}" class="bg-black text-white px-4 py-2 rounded-md hover:bg-opacity-75 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Créer une nouvelle offre
                    </a>
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

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('button[id^="cloturerButton-"]').forEach(function(button) {
                button.addEventListener('click', function () {
                    let offreId = this.getAttribute('data-offre-id');
                    let isCloturer = this.classList.contains('bg-red-500') ? 0 : 1;

                    Swal.fire({
                        title: 'Êtes-vous sûr ?',
                        text: "Vous êtes sur le point de modifier l'etat de cette offre.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Oui, continuer !',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/offres/${offreId}/cloturer`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    closed: isCloturer,
                                    _method: 'PUT'
                                })
                            })
                                .then(response => {
                                    if (response.ok) {
                                        response.json().then(data => {
                                            this.classList.toggle('bg-red-500', data.closed); // Met à jour la couleur de fond
                                            this.classList.toggle('bg-white', !data.closed);
                                            this.classList.toggle('text-white', data.closed);
                                            this.classList.toggle('text-gray-800', !data.closed);
                                            this.innerText = data.closed ? 'Cloturée' : 'Clôturer'; // Met à jour le texte
                                            Swal.fire(
                                                'Mis à jour!',
                                                'L\'état de l\'offre a été mis à jour.',
                                                'success'
                                            );
                                        });
                                    } else {
                                        Swal.fire(
                                            'Erreur!',
                                            'Une erreur s\'est produite lors de la mise à jour.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(() => {
                                    Swal.fire(
                                        'Erreur!',
                                        'Une erreur s\'est produite lors de la mise à jour.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>

    <script>
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
