<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Créer un Forum</h1>
        <form action="{{ route('forum.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium">Nom</label>
                <input type="text" name="nom" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</x-app-layout>
