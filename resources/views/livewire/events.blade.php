<section class="w-full py-12 md:py-24 lg:py-32 bg-white">
    <div class="container px-4 md:px-6 mx-auto">
        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl mb-8">Événements mis en avant</h2>
        <br>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($events as $event)
                <?php
                    $evenement = DB::table('evenements')->where('id', $event->ref_evenement)->first();
                    ?>
                <div class="bg-white overflow-hidden shadow rounded-lg border-2 border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-black-500">
                    <div class="px-4 py-5 sm:p-6">
                        <h4 class="text-lg font-bold text-gray-900 mb-2 text-2xl">{{ $evenement->titre }}</h4>
                        <p class="text-sm text-gray-500 mb-4 text-lg">{{ $evenement->type }}</p>
                        <p class="text-sm text-gray-600 mb-4 text-lg">{{ Str::limit($evenement->description, 100) }}</p>
                        <div class="flex items-center text-sm text-gray-500 mb-2 text-lg">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y H:i') }}
                        </div>
                        <div class="flex items-center text-sm text-gray-500 mb-2 text-lg">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            {{ $evenement->adresse }}
                        </div>
                        <div class="flex items-center text-sm text-gray-500 mb-2 text-lg">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                            Requis : {{ $evenement->elementrequis }}
                        </div>
                        <div class="flex items-center text-sm text-gray-500 text-lg">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            {{ $evenement->nb_place }} places
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
