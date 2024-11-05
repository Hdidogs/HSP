<x-app-layout>
    <div class="py-12">
        <!-- Hero Section -->
        <div class="bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-6xl">
                        Bienvenue sur Notre Plateforme
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Découvrez nos offres exceptionnelles, nos événements passionnants et restez informé de nos
                        dernières actualités.
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="#"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Commencer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offres Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Nos Meilleures Offres
            </h2>
            <div class="mt-6 grid gap-6 lg:grid-cols-3">
                @foreach(range(1, 3) as $index)
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-lg font-medium text-gray-900">Offre {{ $index }}</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Description de l'offre {{ $index }}. Ceci est un exemple de contenu pour illustrer la mise
                                en page.
                            </p>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                En savoir plus &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Événements à Venir Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Événements à Venir</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @forelse($evenementAvants as $evenementAvant)
                                @if($evenementAvant->evenement)
                                    <div class="bg-white overflow-hidden shadow rounded-lg">
                                        <div class="p-4">
                                            <h4 class="text-md font-medium text-gray-900">
                                                {{ $evenementAvant->evenement->titre }}</h4>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Date:
                                                @if($evenementAvant->evenement->date instanceof \DateTime)
                                                    {{ $evenementAvant->evenement->date->format('d/m/Y') }}
                                                @else
                                                    {{ $evenementAvant->evenement->date }}
                                                @endif
                                            </p>
                                            <p class="mt-2 text-sm text-gray-500">
                                                {{ Str::limit($evenementAvant->evenement->description, 100) }}
                                            </p>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 mt-3">
                                            <a href="{{ route('evenements.show', $evenementAvant->evenement) }}"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                En savoir plus &rarr;
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p class="text-gray-500 col-span-full">Aucun événement à venir pour le moment.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Actualités Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-12">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Dernières Actualités
            </h2>
            <div class="mt-6 grid gap-6 lg:grid-cols-3">
                @foreach(range(1, 3) as $index)
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-lg font-medium text-gray-900">Actualité {{ $index }}</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Publié le {{ now()->subDays($index)->format('d/m/Y') }}
                            </p>
                            <p class="mt-2 text-base text-gray-500">
                                Résumé de l'actualité {{ $index }}. Ceci est un exemple de contenu pour illustrer la mise en
                                page.
                            </p>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                Lire la suite &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>