<section class="w-full py-12 md:py-24 lg:py-32 bg-gray-100">
    <div class="container px-4 md:px-6 mx-auto">
        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl mb-8">Actualités</h2>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($news as $item)
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">{{ $item['title'] }}</h3>
                        <p class="text-sm text-muted-foreground">{{ $item['date'] }}</p>
                    </div>
                    <div class="p-6">
                        <p>{{ $item['description'] }}</p>
                    </div>
                    <div class="p-6">
                        <button wire:click="$emit('showNewsDetails', '{{ $item['title'] }}')" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 py-2 px-4">Lire plus</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
