<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100">
            {{ __('Profil de l\'étudiant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-10">
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

                    <div class="flex flex-col md:flex-row gap-10">
                        <div class="md:w-1/3">
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-xl p-6 shadow-lg">
                                <img src="{{ $etudiant['photo'] }}"
                                    alt="Photo de {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}"
                                    class="w-48 h-48 object-cover rounded-full mx-auto shadow-lg ring-4 ring-blue-500 ring-opacity-50">
                                <h3 class="text-2xl font-bold text-center mt-4 text-gray-800 dark:text-gray-200">
                                    {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}
                                </h3>
                                <p class="text-center text-gray-600 dark:text-gray-400">{{ $etudiant['diplome'] }}</p>
                            </div>
                            <div class="mt-6 bg-white dark:bg-gray-700 rounded-xl p-6 shadow-lg">
                                <h4 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Informations
                                    personnelles</h4>
                                <ul class="space-y-2">
                                    <li><strong class="text-gray-700 dark:text-gray-300">Âge:</strong> <span
                                            class="text-gray-600 dark:text-gray-400">{{ $etudiant['age'] }} ans</span>
                                    </li>
                                    <li><strong class="text-gray-700 dark:text-gray-300">Sexe:</strong> <span
                                            class="text-gray-600 dark:text-gray-400">{{ $etudiant['sexe'] }}</span></li>
                                    <li><strong class="text-gray-700 dark:text-gray-300">Adresse:</strong> <span
                                            class="text-gray-600 dark:text-gray-400">{{ $etudiant['adresse'] }}</span>
                                    </li>
                                    <li><strong class="text-gray-700 dark:text-gray-300">Niveau d'étude:</strong> <span
                                            class="text-gray-600 dark:text-gray-400">{{ $etudiant['niveau_etude'] }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:w-2/3">
                            <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-lg">
                                <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">CV</h3>
                                <div
                                    class="h-[calc(100vh-400px)] overflow-y-auto border border-gray-200 dark:border-gray-600 rounded-lg p-4 bg-gray-50 dark:bg-gray-800">
                                    @if($etudiant['cv'])
                                        <img src="{{ $etudiant['cv'] }}"
                                            alt="CV de {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}"
                                            class="w-full h-auto object-contain">
                                    @else
                                        <p class="text-center text-gray-500 dark:text-gray-400">CV non disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('admin.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Retour à la liste
                        </a>
                        <button type="button" onclick="confirmerAction('accepter')"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Accepter
                        </button>
                        <button type="button" onclick="confirmerAction('refuser')"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Refuser
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmerAction(action) {
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
                            // Logique d'acceptation ici
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
                        cancelButtonText: 'Annuler',
                        showLoaderOnConfirm: true,
                        preConfirm: (motif) => {
                            // Logique de refus ici
                            return new Promise((resolve) => {
                                setTimeout(() => {
                                    resolve()
                                }, 1000)
                            })
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
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
    @endpush
</x-app-layout>