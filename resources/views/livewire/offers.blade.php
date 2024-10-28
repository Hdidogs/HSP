<section class="w-full py-12 md:py-24 lg:py-32 bg-white">
    <div class="container px-4 md:px-6 mx-auto">
        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl mb-8">Nos Offres Mises en Avant</h2>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($offers as $offer)
                    <?php $offre = DB::table('offres')->where('id', $offer->ref_offre)->first() ?>
                <div class="bg-white overflow-hidden shadow rounded-lg border-2 border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-black-500">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">{{ $offre->titre }}</h3>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                            Description : {{ $offre->description }}
                        </div>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
                            </svg>
                            Mission : {{ $offre->mission }}
                        </div>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2"/>
                            </svg>
                            <p class="text-sm text-gray-600 mr-2">Salaire :</p>
                            <p class="text-sm font-bold">{{ $offre->salaire . "€" }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
