<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="p-8">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6">
                        Modifier l'activité
                    </h2>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                            <p class="font-medium">Veuillez corriger les erreurs suivantes :</p>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('activite.update', $activite) }}" method="POST" id="activityForm"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="titre" class="block text-sm font-medium text-gray-700">Titre de
                                    l'activité</label>
                                <input type="text" name="titre" id="titre" required
                                    value="{{ old('titre', $activite->titre) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Titre de l'activité">
                            </div>

                            <div>
                                <label for="nb_place" class="block text-sm font-medium text-gray-700">Nombre de
                                    places</label>
                                <input type="number" name="nb_place" id="nb_place" min="0" required
                                    value="{{ old('nb_place', $activite->nb_place) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Capacité maximale">
                            </div>

                            <div class="sm:col-span-2">
                                <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="desc" id="desc" rows="4" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Décrivez votre activité en détail">{{ old('desc', $activite->desc) }}</textarea>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="date" class="block text-sm font-medium text-gray-700">Date et heure</label>
                                <input type="datetime-local" name="date" id="date" required
                                    value="{{ old('date', date('Y-m-d\TH:i', strtotime($activite->date))) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="dateError" class="mt-2 text-sm text-red-600 hidden">La date ne peut pas être
                                    antérieure à aujourd'hui.</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mettre à jour l'activité
                            </button>
                            <a href="{{ route('activite.index') }}"
                                class="text-sm font-medium text-gray-600 hover:text-gray-500">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('date');
            const dateError = document.getElementById('dateError');
            const form = document.getElementById('activityForm');

            dateInput.addEventListener('change', validateDate);
            form.addEventListener('submit', validateForm);

            function validateDate() {
                const selectedDate = new Date(dateInput.value);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (selectedDate < today) {
                    dateError.classList.remove('hidden');
                    dateInput.classList.add('border-red-500');
                } else {
                    dateError.classList.add('hidden');
                    dateInput.classList.remove('border-red-500');
                }
            }

            function validateForm(e) {
                validateDate();
                if (!dateError.classList.contains('hidden')) {
                    e.preventDefault();
                }
            }
        });
    </script>
</x-app-layout>