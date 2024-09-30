<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold">Créer une Offre</h1>
        <form action="{{ route('offre.store') }}" method="POST" class="mt-4">
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
                <label for="mission" class="block text-sm font-medium">Mission</label>
                <textarea name="mission" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>
            <div class="mb-4">
                <label for="salaire" class="block text-sm font-medium">Salaire</label>
                <input type="number" name="salaire" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" step="0.01">
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</x-app-layout>
