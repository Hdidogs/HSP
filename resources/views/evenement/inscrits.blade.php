<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">Les inscrits pour {{ $evenement->titre }}"</h1>

            @if($inscriptions->isEmpty())
                <p>Aucun utilisateur n'est inscrit pour cet événement.</p>
            @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($inscriptions as $inscription)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->user->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inscription->user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('evenement.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Revenir en arrière</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
