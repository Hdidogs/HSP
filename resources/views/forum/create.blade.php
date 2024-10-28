<x-app-layout>
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Créer un Forum</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <form action="{{ route('forum.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
                    @csrf
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom du forum</label>
                        <input type="text" name="nom" id="nom"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <input type="hidden" name="created_by" value="{{ Auth::check() ? Auth::user()->name : 'Inconnu' }}">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Créer le forum
                    </button>
                </form>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Prévisualisation</h2>
                <div id="preview" class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <p class="text-sm text-gray-500 mb-1">ID: (Sera généré automatiquement)</p>
                        <h2 id="previewNom" class="text-xl font-semibold mb-2">Nom du forum</h2>
                        <p id="previewCreatedBy" class="text-gray-600 mb-4">Créé par:
                            {{ Auth::check() ? Auth::user()->name : 'Inconnu' }}</p>
                        <div class="flex justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                                disabled>
                                Modifier
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                                disabled>
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const nomInput = document.getElementById('nom');
        const previewNom = document.getElementById('previewNom');

        function updatePreview() {
            previewNom.textContent = nomInput.value || 'Nom du forum';
        }

        nomInput.addEventListener('input', updatePreview);
    </script>
</x-app-layout>