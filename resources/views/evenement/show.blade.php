<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen pb-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="p-8 space-y-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $evenement->titre }}</h1>
                        <span
                            class="px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded-full shadow-md transform transition-transform duration-300 hover:scale-105">{{ $evenement->type }}</span>
                    </div>

                    <p class="text-xl text-gray-700 leading-relaxed">{{ $evenement->description }}</p>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div
                            class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl transition-all duration-300 hover:bg-gray-100 hover:shadow-md">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Date et heure</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl transition-all duration-300 hover:bg-gray-100 hover:shadow-md">
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Adresse</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $evenement->adresse }}</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl transition-all duration-300 hover:bg-gray-100 hover:shadow-md">
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Éléments requis</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $evenement->elementrequis }}</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl transition-all duration-300 hover:bg-gray-100 hover:shadow-md">
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Places restantes</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $evenement->nb_place }}</p>
                            </div>
                        </div>
                    </div>

                    @if($evenement->date < now())
                        <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded-lg animate-pulse">
                            <p class="font-medium text-red-700">Cet événement est terminé</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div
        class="fixed bottom-0 left-0 right-0 bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg border-t border-gray-200 p-4 shadow-lg">
        <div class="max-w-4xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <a href="{{ route('evenement.index') }}"
                class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-full shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                <svg class="-ml-1 mr-3 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Retour
            </a>

            @if(!$evenement->isCreator && $evenement->date >= now())
                @if($evenement->isUserInscrit(Auth::id()))
                    <form action="{{ route('evenement.desinscription', $evenement) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                            Se désinscrire
                        </button>
                    </form>
                @else
                    <form action="{{ route('evenement.inscription', $evenement) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300"
                            {{ $evenement->nb_place <= 0 ? 'disabled' : '' }}>
                            {{ $evenement->nb_place <= 0 ? 'Complet' : 'S\'inscrire' }}
                        </button>
                    </form>
                @endif
            @elseif($evenement->isCreator)
                <a href="{{ route('evenement.inscrits', $evenement) }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                    Voir les inscrits
                </a>
            @endif

            @if(Auth::user()->ref_role == 3 || Auth::user()->ref_role == 4)
                <div class="flex items-center gap-4">
                    <a href="{{ route('evenement.edit', $evenement) }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-300">
                        Modifier
                    </a>
                    <form action="{{ route('evenement.destroy', $evenement) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent rounded-full shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                            Supprimer
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>