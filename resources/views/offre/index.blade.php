<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Offres</h1>
        <a href="{{ route('offre.create') }}" class="btn btn-primary">Créer une offre</a>
        <table class="min-w-full mt-4 bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Titre</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($offres as $offre)
                <tr>
                    <td class="py-2 px-4 border">{{ $offre->id }}</td>
                    <td class="py-2 px-4 border">{{ $offre->titre }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('offre.show', $offre) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('offre.edit', $offre) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('offre.destroy', $offre) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
