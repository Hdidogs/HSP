<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <section class="bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 lg:py-32">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-6xl">
                        Bienvenue sur Notre Plateforme
                    </h1>
                    <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-300">
                        Découvrez nos offres exceptionnelles, nos événements passionnants et restez informé de nos
                        dernières actualités.
                    </p>
                    <div class="mt-10">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                            Commencer
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">
            <!-- Offres Section -->
            <section>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-8">
                    Nos Meilleures Offres
                </h2>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach(range(1, 3) as $index)
                        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Offre {{ $index }}
                                </h3>
                                <p class="mt-2 text-gray-600">
                                    Description de l'offre {{ $index }}. Ceci est un exemple de contenu pour illustrer la
                                    mise en page.
                                </p>
                            </div>
                            <div class="bg-gray-50 px-6 py-4">
                                <a href="#"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500 flex items-center">
                                    En savoir plus
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>


            <!-- Événements à Venir Section -->
            <section>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-8">
                    Événements à Venir
                </h2>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    @forelse($evenementAvants as $index => $evenementAvant)
                                @if($evenementAvant->evenement)
                                            <div class="bg-white overflow-hidden shadow-sm rounded-lg flex flex-col">
                                                <div class="p-6 flex-grow">
                                                    <h3 class="text-lg font-medium text-gray-900 flex items-center mb-2">
                                                        <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                        <span class="truncate">{{ Str::limit($evenementAvant->evenement->titre, 50) }}</span>
                                                    </h3>
                                                    <p class="text-sm text-gray-500 flex items-center mb-2">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        Publié le {{ $evenementAvant->evenement->date instanceof \DateTime
                                    ? $evenementAvant->evenement->date->format('d/m/Y')
                                    : date('d/m/Y', strtotime($evenementAvant->evenement->date)) }}
                                                    </p>
                                                    <p class="text-gray-600 line-clamp-3">
                                                        {{ Str::limit($evenementAvant->evenement->description, 150) }}
                                                    </p>
                                                </div>
                                                <div class="bg-gray-50 px-6 py-4 mt-auto">
                                                    <a href="{{ route('evenements.show', $evenementAvant->evenement) }}"
                                                        class="text-sm font-medium text-indigo-600 hover:text-indigo-500 flex items-center">
                                                        En savoir plus
                                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                @endif
                    @empty
                        <p class="text-gray-500 col-span-full">Aucun événement à venir pour le moment.</p>
                    @endforelse
                </div>
            </section>

            <!-- Actualités Section -->
            <section>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-8">
                    Dernières Actualités
                </h2>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach(range(1, 3) as $index)
                        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                        </path>
                                    </svg>
                                    Actualité {{ $index }}
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Publié le {{ now()->subDays($index)->format('d/m/Y') }}
                                </p>
                                <p class="mt-2 text-gray-600">
                                    Résumé de l'actualité {{ $index }}. Ceci est un exemple de contenu pour illustrer la
                                    mise en page.
                                </p>
                            </div>
                            <div class="bg-gray-50 px-6 py-4">
                                <a href="#"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500 flex items-center">
                                    Lire la suite
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>