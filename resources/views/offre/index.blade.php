<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($offres as $offre)
                        @if($offre->closed != 1 && Auth::user()->id == $offre->ref_user || DB::table('partenaires')->where("ref_user", $offre->ref_user)->value('ref_entreprise') == DB::table('partenaires')->where("ref_user", Auth::user()->id)->value('ref_entreprise'))
                        <div class="bg-white shadow-md rounded-lg p-6 py-10 px-10">
                            <h2 class="text-xl font-semibold mb-2">{{ $offre->titre }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit($offre->description, 100) }}</p>
                            <p class="text-gray-600 mb-2">Mission : {{ Str::limit($offre->mission, 100) }}</p>
                            @if($offre->salaire)
                                <p class="text-gray-600 mb-2">Salaire : {{ number_format($offre->salaire, 2) }} €</p>
                            @endif
                            @if(Auth::user()->id == $offre->ref_user)
                                @if(Auth::user()->id == $offre->ref_user)
                                    <input class="mb-2" type="checkbox" id="cloturerCheckbox-{{ $offre->id }}" data-offre-id="{{ $offre->id }}" {{ $offre->closed == 1 ? 'checked' : '' }}> Clôturer ?
                                @endif
                            @elseif($offre->closed == 1)
                                <p class="text-red-500 mb-2">Cloturée</p>
                            @endif
                            <br>
                            <a href="{{ route('offre.show', $offre) }}" class="text-blue-500 hover:text-blue-700">Voir plus</a>
                            @if(Auth::user()->id == $offre->ref_user)
                            <a href="{{ route('offre.edit', $offre) }}" class="text-green-500 hover:text-green-700 ml-2">Modifier</a>
                            @endif
                            @if(Auth::user()->id == $offre->ref_user)
                            <form id="delete-form-{{ $offre->id }}" action="{{ route('offre.destroy', $offre) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('delete-form-{{ $offre->id }}')" class="text-red-500 hover:text-red-700 ml-2">Supprimer</button>
                            </form>
                            @endif
                        </div>
                        @endif
                    @endforeach
                    @if($offres->isEmpty() || $offres->where('closed', 1)->count() == $offres->count() || $offres->where("ref_user",Auth::user()->id)->count() < 1)
                    <check>
                        <div class="bg-white shadow-md rounded-lg p-6 py-10 px-10">
                            <p class="text-gray-600 mb-4">Aucune offre d'emploi pour le moment.</p>
                        </div>
                    </check>
                    @endif
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if(Auth::user()->ref_role == 3 || Auth::user()->ref_role == 4 )
                        <br>
                    <form action="{{ route('offre.create') }}" method="GET">
                    @csrf
                    <button type="submit" onclick="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                        Créer une nouvelle offre
                    </button>
                    </form>
                    @endif
                </div>
            </div>
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
            document.querySelectorAll('input[type="checkbox"][id^="cloturerCheckbox-"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function () {
                    let offreId = this.getAttribute('data-offre-id');
                    let isCloturer = this.checked ? 1 : 0;

                    Swal.fire({
                        title: 'Êtes-vous sûr ?',
                        text: "Vous êtes sur le point de cloturer cette offre.",
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
                                        Swal.fire(
                                            'Mis à jour!',
                                            'L\'état de l\'offre a été mis à jour.',
                                            'success'
                                        );
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
                        } else {
                            checkbox.checked = !isCloturer;
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
