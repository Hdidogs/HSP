<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil de l\'étudiant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    @php
                        $etudiant = [
                            'nom' => 'Dupont',
                            'prenom' => 'Jean',
                            'age' => 22,
                            'sexe' => 'Homme',
                            'adresse' => '123 Rue de la Paix, 75000 Paris',
                            'diplome' => 'Licence en Informatique',
                            'niveau_etude' => 'Bac+3',
                            'photo' => 'https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1180&q=80',
                            'cv' => 'https://erfmatd5itv.exactdn.com/wp-content/uploads/2022/04/DEVELOPPEUR-WEB.png?strip=all&lossy=1&ssl=1',
                        ];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="md:col-span-1 bg-gray-50 p-6 rounded-lg shadow">
                            <div class="text-center">
                                <img src="{{ $etudiant['photo'] }}"
                                    alt="{{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}"
                                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                <h2 class="text-xl font-semibold mb-2">{{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}
                                </h2>
                                <p class="text-gray-600">{{ $etudiant['diplome'] }}</p>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-lg font-semibold mb-2">Informations personnelles</h3>
                                <ul class="space-y-2">
                                    <li><strong>Âge:</strong> {{ $etudiant['age'] }} ans</li>
                                    <li><strong>Sexe:</strong> {{ $etudiant['sexe'] }}</li>
                                    <li><strong>Adresse:</strong> {{ $etudiant['adresse'] }}</li>
                                    <li><strong>Niveau d'étude:</strong> {{ $etudiant['niveau_etude'] }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:col-span-2 bg-white p-6 rounded-lg shadow">
                            <h3 class="text-xl font-semibold mb-4">CV</h3>
                            <div class="h-[calc(100vh-400px)] overflow-y-auto border rounded-lg">
                                <img src="{{ $etudiant['cv'] }}"
                                    alt="CV de {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}" class="w-full h-auto">
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center space-x-4">
                        <a href="{{ route('admin.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Retour à la liste
                        </a>
                        <button onclick="confirmerAction('accepter')"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                            Accepter
                        </button>
                        <button onclick="confirmerAction('refuser')"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                            Refuser
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmerAction(action) {
            console.log('Action:', action);
            if (action === 'accepter') {
                Swal.fire({
                    title: 'Confirmer l\'acceptation',
                    text: "Voulez-vous vraiment accepter cet étudiant ?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#10B981',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Oui, accepter !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Accepté !',
                            text: 'L\'étudiant a été accepté avec succès.',
                            icon: 'success',
                            confirmButtonColor: '#10B981'
                        });
                    }
                });
            } else if (action === 'refuser') {
                Swal.fire({
                    title: 'Motif de refus',
                    input: 'textarea',
                    inputPlaceholder: 'Entrez le motif de refus (optionnel)',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Refuser',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.value !== undefined) {
                        Swal.fire({
                            title: 'Refusé !',
                            text: 'L\'étudiant a été refusé.' + (result.value ? ' Motif : ' + result.value : ''),
                            icon: 'info',
                            confirmButtonColor: '#3B82F6'
                        });
                    }
                });
            }
        }
    </script>
</x-app-layout>