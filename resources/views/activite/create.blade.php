<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="p-8">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6">
                        Créer une nouvelle activité
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

                    <form action="{{ route('activite.store') }}" method="POST" id="activityForm" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <x-label for="titre" :value="__('Titre de l\'activité')" />
                                <x-input id="titre" class="block mt-1 w-full" type="text" name="titre"
                                    :value="old('titre')" required autofocus placeholder="Titre de l'activité" />
                            </div>

                            <div>
                                <x-label for="desc" :value="__('Description')" />
                                <textarea id="desc" name="desc" rows="4"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required
                                    placeholder="Décrivez votre activité en détail">{{ old('desc') }}</textarea>
                            </div>

                            <div>
                                <x-label for="date" :value="__('Date et heure')" />
                                <x-input id="date" class="block mt-1 w-full" type="datetime-local" name="date"
                                    :value="old('date')" required />
                                <p id="dateError" class="mt-2 text-sm text-red-600 hidden">La date ne peut pas être
                                    antérieure à aujourd'hui.</p>
                            </div>

                            <div>
                                <x-label for="nb_place" :value="__('Nombre de places')" />
                                <x-input id="nb_place" class="block mt-1 w-full" type="number" name="nb_place"
                                    :value="old('nb_place')" required min="1" placeholder="Capacité maximale" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6">
                            <x-button>
                                {{ __('Créer l\'activité') }}
                            </x-button>
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