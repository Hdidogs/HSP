<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Forums</h1>
        <a href="{{ route('forum.create') }}" class="btn btn-primary">Créer un forum</a>
        <table class="min-w-full mt-4 bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Nom</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($forums as $forum)
                <tr>
                    <td class="py-2 px-4 border">{{ $forum->id }}</td>
                    <td class="py-2 px-4 border">{{ $forum->nom }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('forum.edit', $forum) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('forum.destroy', $forum) }}" method="POST" style="display:inline;">
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
