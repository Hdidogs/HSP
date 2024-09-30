<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Posts</h1>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Créer un post</a>
        <table class="min-w-full mt-4 bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Titre</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="py-2 px-4 border">{{ $post->id }}</td>
                    <td class="py-2 px-4 border">{{ $post->titre }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('post.show', $post) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('post.destroy', $post) }}" method="POST" style="display:inline;">
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
