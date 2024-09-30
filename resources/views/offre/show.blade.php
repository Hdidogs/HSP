<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">{{ $offre->titre }}</h1>
        <p>Description: {{ $offre->description }}</p>
        <p>Mission : {{ $offre->mission }}</p>
        <p>Salaire : {{$offre->salaire}}</p>
        <p>Créé par: {{ $offre->ref_user }}</p>
        <a href="{{ route('offre.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</x-app-layout>
