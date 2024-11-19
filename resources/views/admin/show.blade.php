<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de l\'étudiant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        $etudiant = [
                            'nom' => 'Dupont',
                            'prenom' => 'Jean',
                            'age' => 22,
                            'sexe' => 'Homme',
                            'adresse' => '123 Rue de la Paix, 75000 Paris',
                            'diplome' => 'Licence en Informatique',
                            'niveau_etude' => 'Bac+3',
                            'photo' => '/placeholder.svg?height=100&width=100&text=Jean',
                            'cv' => '/placeholder.svg?height=300&width=200&text=CV+Jean+Dupont',
                        ];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <img src="{{ $etudiant['photo'] }}"
                                alt="Photo de {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}"
                                class="w-32 h-32 object-cover rounded-full mx-auto">
                            <p><strong>Nom:</strong> {{ $etudiant['nom'] }}</p>
                            <p><strong>Prénom:</strong> {{ $etudiant['prenom'] }}</p>
                            <p><strong>Âge:</strong> {{ $etudiant['age'] }} ans</p>
                            <p><strong>Sexe:</strong> {{ $etudiant['sexe'] }}</p>
                            <p><strong>Adresse:</strong> {{ $etudiant['adresse'] }}</p>
                            <p><strong>Diplôme:</strong> {{ $etudiant['diplome'] }}</p>
                            <p><strong>Niveau d'étude:</strong> {{ $etudiant['niveau_etude'] }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">CV</h3>
                            <div class="h-64 overflow-y-auto border rounded p-4">
                                <img src="{{ $etudiant['cv'] }}"
                                    alt="CV de {{ $etudiant['prenom'] }} {{ $etudiant['nom'] }}" class="w-full">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>