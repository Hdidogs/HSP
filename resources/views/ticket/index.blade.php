<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Tickets</h1>
            <a href="{{ route('ticket.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                Créer un ticket
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Objet
                        </th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Utilisateur</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Importance</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                        </th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($tickets as $ticket)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-4 px-4">{{ $ticket->objet }}</td>
                                        <td class="py-4 px-4">{{ Str::limit($ticket->description, 50) }}</td>
                                        <td class="py-4 px-4">{{ $ticket->user->nom }}</td>
                                        <td class="py-4 px-4">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $ticket->importance->libelle === 'Haute' ? 'bg-red-100 text-red-800' :
                        ($ticket->importance->libelle === 'Moyenne' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                                {{ $ticket->importance->libelle }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4">{{ $ticket->date }}</td>
                                        <td class="py-4 px-4">
                                            @if($ticket->fin)
                                                <a href="{{ route('ticket.open', $ticket->id) }}"
                                                   class="text-green-600 hover:text-blue-900 mr-2">Réouvrir</a>
                                            @else
                                                <a href="{{ route('ticket.close', $ticket->id) }}"
                                                   class="text-red-500 hover:text-blue-900 mr-2">Clôre</a>
                                            @endif
                                            <a href="{{ route('ticket.show', $ticket->id) }}"
                                                class="text-blue-600 hover:text-blue-900 mr-2">Voir</a>
                                            <a href="{{ route('ticket.edit', $ticket->id) }}"
                                                class="text-yellow-600 hover:text-yellow-900 mr-2">Modifier</a>
                                            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
