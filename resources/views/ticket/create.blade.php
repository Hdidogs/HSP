<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold">Créer un ticket</h1>

        <form action="{{ route('ticket.store') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="objet" class="block">Objet</label>
                <input type="text" name="objet" id="objet" class="border rounded w-full px-3 py-2" required>
            </div>

            <div class="mt-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" id="description" class="border rounded w-full px-3 py-2" required></textarea>
            </div>

            <div class="mt-4">
                <label for="ref_user" class="block">Utilisateur</label>
                <select name="ref_user" id="ref_user" class="border rounded w-full px-3 py-2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="ref_importance" class="block">Importance</label>
                <select name="ref_importance" id="ref_importance" class="border rounded w-full px-3 py-2">
                    @foreach ($importances as $importance)
                        <option value="{{ $importance->id }}">{{ $importance->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="ref_gestionnaire" class="block">Gestionnaire</label>
                <select name="ref_gestionnaire" id="ref_gestionnaire" class="border rounded w-full px-3 py-2">
                    @foreach ($gestionnaires as $gestionnaire)
                        <option value="{{ $gestionnaire->id }}">{{ $gestionnaire->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="date" class="block">Date</label>
                <input type="date" name="date" id="date" class="border rounded w-full px-3 py-2" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>
