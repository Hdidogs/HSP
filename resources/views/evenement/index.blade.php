<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Événements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-extrabold text-gray-900">Gestion des Événements</h3>
                        <a href="{{ route('evenement.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Créer un événement
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($evenements as $evenement)
                            <div
                                class="bg-white overflow-hidden shadow rounded-lg border-2 border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-indigo-500">
                                <div class="px-4 py-5 sm:p-6">
                                    <h4 class="text-lg font-bold text-gray-900 mb-2 text-2xl">{{ $evenement->titre }}</h4>
                                    <p class="text-sm text-gray-500 mb-4 text-lg">{{ $evenement->type }}</p>
                                    <p class="text-sm text-gray-600 mb-4 text-lg">
                                        {{ Str::limit($evenement->description, 100) }}
                                    </p>
                                    <div class="flex items-center text-sm text-gray-500 mb-2 text-lg">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y H:i') }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 mb-2 text-lg">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $evenement->adresse }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 mb-2 text-lg">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                        </svg>
                                        Requis : {{ $evenement->elementrequis }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500 text-lg">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                        {{ $evenement->nb_place }} places
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-4 sm:px-6 flex justify-end space-x-2">
                                    <a href="{{ route('evenement.edit', $evenement) }}"
                                        class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 2.487a3.375 3.375 0 114.771 4.77L7.5 21.39l-4.72.473.473-4.72L16.862 2.487z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('evenement.destroy', $evenement) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                    @if($evenement->isUserInscrit(auth()->id()))
                                        <button onclick="confirmDesinscription({{ $evenement->id }})"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Désinscrire
                                        </button>
                                    @else
                                        <button onclick="confirmInscription({{ $evenement->id }})"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            S'inscrire
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmInscription(evenementId) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Voulez-vous vous inscrire à cet événement ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, inscrire !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoadingAnimation();
                    document.getElementById('inscription-form-' + evenementId).submit();
                }
            });
        }

        function confirmDesinscription(evenementId) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Voulez-vous vous désinscrire de cet événement ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, désinscrire !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoadingAnimation();
                    document.getElementById('desinscription-form-' + evenementId).submit();
                }
            });
        }

        function showLoadingAnimation() {
            const loadingDiv = document.createElement('div');
            loadingDiv.id = 'loading-animation';
            loadingDiv.style.position = 'fixed';
            loadingDiv.style.top = '50%';
            loadingDiv.style.left = '50%';
            loadingDiv.style.transform = 'translate(-50%, -50%)';
            loadingDiv.style.zIndex = '9999';
            loadingDiv.innerHTML = `
                <div class="flex items-center justify-center space-x-2">
                    <div class="w-8 h-8 border-4 border-blue-500 border-dotted rounded-full animate-spin"></div>
                    <div class="text-lg font-semibold">Chargement...</div>
                </div>
            `;
            document.body.appendChild(loadingDiv);
        }
    </script>
    <style>
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }
    </style>

    @foreach($evenements as $evenement)
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