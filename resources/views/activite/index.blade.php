<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($activites as $activite)
                        <div class="bg-white shadow-md rounded-lg p-6 py-10 px-10">
                            <h2 class="text-xl font-semibold mb-2">{{ $activite->titre }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit($activite->desc, 100) }}</p>
                            <p class="text-gray-600 mb-2">Nombre de places : {{ $activite->nb_place }}</p>
                            <p class="text-gray-600 mb-2">Date et Heure : {{ $activite->date }}</p>
                            <a href="{{ route('activite.edit', $activite) }}"
                                class="text-green-500 hover:text-green-700 ml-2">Modifier</a>
                            <form id="delete-form-{{ $activite->id }}" action="{{ route('activite.destroy', $activite) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('delete-form-{{ $activite->id }}')"
                                    class="text-red-500 hover:text-red-700 ml-2">Supprimer</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-end mt-4">
                    <br>
                    <a href="{{ route('activite.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Créer une nouvelle
                        activité</a>
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
    </script>
</x-app-layout>