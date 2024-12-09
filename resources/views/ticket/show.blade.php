<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold">Détails du ticket</h1>

        <div class="mt-4">
            <h2 class="text-lg">Objet: {{ $ticket->objet }}</h2>
            <p>Description: {{ $ticket->description }}</p>
            <p>Utilisateur: {{ $ticket->user->nom }}</p>
            <p>Importance: {{ $ticket->importance->libelle }}</p>
            <p>Date: {{ $ticket->date }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('ticket.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Retour à la liste</a>
            <a href="{{ route('ticket.edit', $ticket->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </form>
        </div>
    </div>
</x-app-layout>
