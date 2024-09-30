<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Créer un Post</h1>
        <form action="{{ route('post.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium">Titre</label>
                <input type="text" name="titre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>
            <div class="mb-4">
                <label for="ref_forum" class="block text-sm font-medium">Forum</label>
                <select name="ref_forum" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Sélectionnez un forum</option>
                    @foreach ($forums as $forum)
                        <option value="{{ $forum->id }}">{{ $forum->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</x-app-layout>
