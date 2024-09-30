<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold">Modifier le ticket</h1>

        <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4">
                <label for="objet" class="block">Objet</label>
                <input type="text" name="objet" id="objet" class="border rounded w-full px-3 py-2" value="{{ $ticket->objet }}" required>
            </div>

            <div class="mt-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" id="description" class="border rounded w-full px-3 py-2" required>{{ $ticket->description }}</textarea>
            </div>

            <div class="mt-4">
                <label for="ref_user" class="block">Utilisateur</label>
                <select name="ref_user" id="ref_user" class="border rounded w-full px-3 py-2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $ticket->ref_user == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="ref_importance" class="block">Importance</label>
                <select name="ref_importance" id="ref_importance" class="border rounded w-full px-3 py-2">
                    @foreach ($importances as $importance)
                        <option value="{{ $importance->id }}" {{ $ticket->ref_importance == $importance->id ? 'selected' : '' }}>{{ $importance->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="ref_gestionnaire" class="block">Gestionnaire</label>
                <select name="ref_gestionnaire" id="ref_gestionnaire" class="border rounded w-full px-3 py-2">
                    @foreach ($gestionnaires as $gestionnaire)
                        <option value="{{ $gestionnaire->id }}" {{ $ticket->ref_gestionnaire == $gestionnaire->id ? 'selected' : '' }}>{{ $gestionnaire->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="date" class="block">Date</label>
                <input type="date" name="date" id="date" class="border rounded w-full px-3 py-2" value="{{ $ticket->date }}" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</button>
            </div>
        </form>
    </div>
</x-app-layout>
