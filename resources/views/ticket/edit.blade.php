<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="py-4 px-6 bg-gray-100 border-b">
                <h1 class="text-2xl font-bold text-gray-800">Modifier le ticket</h1>
            </div>

            <form action="{{ route('ticket.update', $ticket->id) }}" method="POST" class="py-4 px-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="objet" class="block text-gray-700 font-bold mb-2">Objet</label>
                    <input type="text" name="objet" id="objet"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        value="{{ $ticket->objet }}" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        required>{{ $ticket->description }}</textarea>
                </div>

                <input type="hidden" name="ref_user" value="{{ Auth::user()->id }}">

                <div class="mb-4">
                    <label for="ref_importance" class="block text-gray-700 font-bold mb-2">Importance</label>
                    <select name="ref_importance" id="ref_importance"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        @foreach ($importances as $importance)
                            <option value="{{ $importance->id }}" {{ $ticket->ref_importance == $importance->id ? 'selected' : '' }}>{{ $importance->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="date" value="{{ $ticket->date }}">

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                        Mettre à jour le ticket
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>