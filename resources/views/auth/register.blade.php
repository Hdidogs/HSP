<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nom -->
            <div>
                <x-label for="nom" value="{{ __('Nom') }}" />
                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
            </div>

            <!-- Prénom -->
            <div class="mt-4">
                <x-label for="prenom" value="{{ __('Prénom') }}" />
                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autocomplete="prenom" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Mot de passe -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Mot de passe') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirmation du mot de passe -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmer le mot de passe') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Rôle -->
            <div class="mt-4">
                <x-label for="role" value="{{ __('Rôle') }}" />
                <select id="role" name="role" class="block mt-1 w-full" required>
                    <option value="choix" disabled selected>Choisissez un rôle</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Champs dynamiques pour Étudiant -->
            <div id="etudiant_fields" style="display: none;" class="mt-4">
                <x-label for="cv" value="{{ __('CV') }}" />
                <x-input id="cv" class="block mt-1 w-full" type="file" name="cv" />

                <x-label for="etude" value="{{ __('Étude') }}" class="mt-4" />
                <x-input id="etude" class="block mt-1 w-full" type="text" name="etude" />

                <div class="mt-4 flex items-end space-x-2">
                    <div class="flex-grow">
                        <x-label for="ref_etablissement" value="{{ __('Établissement') }}" />
                        <select id="ref_etablissement" name="ref_etablissement" class="block mt-1 w-full">
                            <option value="choix" disabled selected>Choisissez votre établissement</option>
                            @foreach($etablissements as $etablissement)
                                <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="px-3 py-2 bg-blue-500 text-black rounded hover:bg-blue-600" onclick="openModal('etablissementModal')">
                        +
                    </button>
                </div>
            </div>

            <!-- Champs dynamiques pour Médecin -->
            <div id="medecin_fields" style="display: none;" class="mt-4">
                <x-label for="ref_specialite" value="{{ __('Spécialité') }}" />
                <div class="mt-4 flex items-end space-x-2">
                    <div class="flex-grow">
                        <select id="ref_specialite" name="ref_specialite" class="block mt-1 w-full">
                            <option value="choix" disabled selected>Choisissez votre specialité</option>
                            @foreach($specialites as $specialite)
                                <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="px-3 py-2 bg-blue-500 text-black rounded hover:bg-blue-600" onclick="openModal('specialiteModal')">
                        +
                    </button>
                </div>

                <x-label for="ref_hopital" value="{{ __('Hôpital') }}" class="mt-4" />
                <div class="mt-4 flex items-end space-x-2">
                    <div class="flex-grow">
                        <select id="ref_hopital" name="ref_hopital" class="block mt-1 w-full">
                            <option value="choix" disabled selected>Choisissez votre hopital</option>
                            @foreach($hopitaux as $hopital)
                                <option value="{{ $hopital->id }}">{{ $hopital->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="px-3 py-2 bg-blue-500 text-black rounded hover:bg-blue-600" onclick="openModal('hopitalModal')">
                        +
                    </button>
                </div>

                <x-label for="ref_etablissement_medecin" value="{{ __('Établissement') }}" class="mt-4" />
                <div class="mt-4 flex items-end space-x-2">
                    <div class="flex-grow">
                        <select id="ref_etablissement_medecin" name="ref_etablissement" class="block mt-1 w-full">
                            <option value="choix" disabled selected>Choisissez votre établissement</option>
                            @foreach($etablissements as $etablissement)
                                <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="px-3 py-2 bg-blue-500 text-black rounded hover:bg-blue-600" onclick="openModal('etablissementModal')">
                        +
                    </button>
                </div>
            </div>

            <!-- Champs dynamiques pour Partenaire -->
            <div id="partenaire_fields" style="display: none;" class="mt-4">
                <x-label for="poste" value="{{ __('Poste') }}" />
                <x-input id="poste" class="block mt-1 w-full" type="text" name="poste" />

                <x-label for="ref_entreprise" value="{{ __('Entreprise') }}" class="mt-4" />
                <div class="mt-4 flex items-end space-x-2">
                    <div class="flex-grow">
                        <select id="ref_entreprise" name="ref_entreprise" class="block mt-1 w-full">
                            <option value="choix" disabled selected>Choisissez votre entreprise</option>
                            @foreach($entreprises as $entreprise)
                                <option value="{{ $entreprise->id }}">{{ $entreprise->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="px-3 py-2 bg-blue-500 text-black rounded hover:bg-blue-600" onclick="openModal('entrepriseModal')">
                        +
                    </button>
                </div>
            </div>

            <div class="flex justify-between">
                <!-- Lien "Déjà connecté ?" -->
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 underline">
                        Déjà connecté ?
                    </a>
                </div>

                <!-- Bouton -->
                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('S\'inscrire') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<div id="specialiteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ajouter une nouvelle spécialité</h3>
            <form id="newSpecialiteForm" class="mt-2 text-left">
                @csrf
                <div class="mt-2">
                    <x-label for="libelle" value="{{ __('Libelle') }}" />
                    <x-input id="libelle" class="block mt-1 w-full" type="text" name="libelle" required />
                </div>
                <div class="items-center px-4 py-3">
                    <button type="button" onclick="closeModal('specialiteModal')" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Retour
                    </button>
                    <button id="submitSpecialite" type="submit" class="px-4 py-2 bg-blue-500 text-black text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="entrepriseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ajouter une nouvelle Entreprise</h3>
            <form id="newSpecialiteForm" class="mt-2 text-left">
                @csrf
                <div class="mt-2">
                    <x-label for="nom" value="{{ __('Nom') }}" />
                    <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" required />
                </div>
                <div class="mt-2">
                    <x-label for="adresseweb" value="{{ __('Adresse Web') }}" />
                    <x-input id="adresseweb" class="block mt-1 w-full" type="text" name="adresseweb" required />
                </div>
                <div class="mt-2">
                    <x-label for="numero" value="{{ __('Numéro') }}" />
                    <x-input id="numero" class="block mt-1 w-full" type="text" name="numero" required />
                </div>
                <div class="items-center px-4 py-3">
                    <button type="button" onclick="closeModal('entrepriseModal')" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Retour
                    </button>
                    <button id="submitEntreprise" type="submit" class="px-4 py-2 bg-blue-500 text-black text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="hopitalModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ajouter un nouvelle Hopital</h3>
            <form id="newSpecialiteForm" class="mt-2 text-left">
                @csrf
                <div class="mt-2">
                    <x-label for="nom" value="{{ __('Nom') }}" />
                    <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" required />
                </div>
                <div class="mt-2">
                    <x-label for="rue" value="{{ __('Rue') }}" />
                    <x-input id="rue" class="block mt-1 w-full" type="text" name="rue" required />
                </div>
                <div class="mt-2">
                    <x-label for="ville" value="{{ __('Ville') }}" />
                    <x-input id="ville" class="block mt-1 w-full" type="text" name="ville" required />
                </div>
                <div class="mt-2">
                    <x-label for="adresse" value="{{ __('Adresse') }}" />
                    <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" required />
                </div>
                <div class="mt-2">
                    <x-label for="cp" value="{{ __('Code Postal') }}" />
                    <x-input id="cp" class="block mt-1 w-full" type="text" name="cp" required />
                </div>
                <div class="items-center px-4 py-3">
                    <button type="button" onclick="closeModal('hopitalModal')" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Retour
                    </button>
                    <button id="submitHopital" type="submit" class="px-4 py-2 bg-blue-500 text-black text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for adding a new establishment -->
<div id="etablissementModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ajouter un nouvel établissement</h3>
            <form id="newEtablissementForm" class="mt-2 text-left">
                @csrf
                <div class="mt-2">
                    <x-label for="nom" value="{{ __('Nom') }}" />
                    <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" required />
                </div>
                <div class="mt-2">
                    <x-label for="adresseweb" value="{{ __('Adresse Web') }}" />
                    <x-input id="adresseweb" class="block mt-1 w-full" type="text" name="adresseweb" />
                </div>
                <div class="mt-2">
                    <x-label for="rue" value="{{ __('Rue') }}" />
                    <x-input id="rue" class="block mt-1 w-full" type="text" name="rue" required />
                </div>
                <div class="mt-2">
                    <x-label for="adresse" value="{{ __('Adresse') }}" />
                    <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" required />
                </div>
                <div class="mt-2">
                    <x-label for="ville" value="{{ __('Ville') }}" />
                    <x-input id="ville" class="block mt-1 w-full" type="text" name="ville" required />
                </div>
                <div class="mt-2">
                    <x-label for="cp" value="{{ __('Code Postal') }}" />
                    <x-input id="cp" class="block mt-1 w-full" type="text" name="cp" required />
                </div>
                <div class="items-center px-4 py-3">
                    <button type="button" onclick="closeModal('etablissementModal')" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Retour
                    </button>
                    <button id="submitEtablissement" type="submit" class="px-4 py-2 bg-blue-500 text-black text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('role').addEventListener('change', function () {
        const role = this.value;
        document.getElementById('etudiant_fields').style.display = (role == 2) ? 'block' : 'none';
        document.getElementById('medecin_fields').style.display = (role == 3) ? 'block' : 'none';
        document.getElementById('partenaire_fields').style.display = (role == 4) ? 'block' : 'none';
    });

    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    function handleSubmit(formId, url, selectId) {
        document.getElementById(formId).addEventListener('submit', function (event) {
            event.preventDefault();

            var form = document.getElementById(formId);
            var formData = new FormData(form);

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Ajoute la nouvelle option au select
                        var select = document.getElementById(selectId);
                        var newOption = document.createElement('option');
                        newOption.value = data.item.id;
                        newOption.textContent = data.item.nom;
                        select.appendChild(newOption);

                        // Ferme le modal
                        closeModal(formId.replace('Form', 'Modal'));

                        // Réinitialise le formulaire
                        form.reset();
                    } else {
                        alert('Une erreur est survenue. Veuillez réessayer.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Une erreur est survenue. Veuillez réessayer.');
                });
        });
    }

    handleSubmit('newSpecialiteForm', '/specialite/create', 'ref_specialite');
    handleSubmit('newHopitalForm', '/hopital/create', 'ref_hopital');
    handleSubmit('newEntrepriseForm', '/entreprise/create', 'ref_entreprise');
    handleSubmit('newEtablissementForm', '/etablissement/create', 'ref_etablissement');
</script>
