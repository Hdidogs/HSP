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

            <input type="hidden" name="ref_user" value="{{ Auth::user()->id }}">

            <div class="mt-4">
                <label for="ref_importance" class="block">Importance</label>
                <select name="ref_importance" id="ref_importance" class="border rounded w-full px-3 py-2">
                    @foreach ($importances as $importance)
                        <option value="{{ $importance->id }}">{{ $importance->libelle }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="hidden" name="date" value="{{ \Carbon\Carbon::now()->toDateString() }}">

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>
