<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Modifier le Post</h1>
        <form action="{{ route('post.update', $post) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium">Titre</label>
                <input type="text" name="titre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $post->titre }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ $post->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="ref_forum" class="block text-sm font-medium">Forum</label>
                <select name="ref_forum" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach ($forums as $forum)
                        <option value="{{ $forum->id }}" {{ $post->ref_forum == $forum->id ? 'selected' : '' }}>{{ $forum->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>
