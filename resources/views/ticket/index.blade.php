<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold">Tickets</h1>
        <a href="{{ route('ticket.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Créer un ticket</a>

        <table class="min-w-full mt-4">
            <thead>
            <tr>
                <th class="py-2">Objet</th>
                <th class="py-2">Description</th>
                <th class="py-2">Utilisateur</th>
                <th class="py-2">Importance</th>
                <th class="py-2">Date</th>
                <th class="py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td class="py-2">{{ $ticket->objet }}</td>
                    <td class="py-2">{{ $ticket->description }}</td>
                    <td class="py-2">{{ $ticket->user->nom }}</td>
                    <td class="py-2">{{ $ticket->importance->libelle }}</td>
                    <td class="py-2">{{ $ticket->date }}</td>
                    <td class="py-2">
                        <a href="{{ route('ticket.show', $ticket->id) }}" class="text-blue-500">Voir</a>
                        <a href="{{ route('ticket.edit', $ticket->id) }}" class="text-blue-500">Modifier</a>
                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
