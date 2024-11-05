<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">Les inscrits pour "{{ $evenement->titre }}"</h1>

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if($inscriptions->isEmpty())
                <p>Aucun utilisateur n'est inscrit pour cet événement.</p>
            @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            @if($evenement->isUserCreator(auth()->id()))
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($inscriptions as $inscription)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->user->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->user->email }}</td>
                                @if($evenement->isUserCreator(auth()->id()))
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form
                                            action="{{ route('evenement.removeUserFromEvent', ['evenement' => $evenement->id, 'user' => $inscription->ref_user]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer {{ $inscription->user->nom }} de cet événement ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none"
                                                title="Supprimer {{ $inscription->user->nom }} de l'événement">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="sr-only">Supprimer {{ $inscription->user->nom }}</span>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="mt-4">
                <a href="{{ route('evenement.index') }}"
                    class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Revenir en arrière</a>
            </div>
        </div>
    </div>
</x-app-layout>