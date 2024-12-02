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

                <x-label for="ref_etablissement" value="{{ __('Établissement') }}" class="mt-4" />
                <select id="ref_etablissement" name="ref_etablissement" class="block mt-1 w-full">
                    <option value="choix" disabled selected>Choisissez votre établissement</option>
                    @foreach($etablissements as $etablissement)
                        <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Champs dynamiques pour Médecin -->
            <div id="medecin_fields" style="display: none;" class="mt-4">
                <x-label for="ref_specialite" value="{{ __('Spécialité') }}" />
                <select id="ref_specialite" name="ref_specialite" class="block mt-1 w-full">
                    <option value="choix" disabled selected>Choisissez votre specialité</option>
                    @foreach($specialites as $specialite)
                        <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                    @endforeach
                </select>

                <x-label for="ref_hopital" value="{{ __('Hôpital') }}" class="mt-4" />
                <select id="ref_hopital" name="ref_hopital" class="block mt-1 w-full">
                    <option value="choix" disabled selected>Choisissez votre hopital</option>
                    @foreach($hopitaux as $hopital)
                        <option value="{{ $hopital->id }}">{{ $hopital->nom }}</option>
                    @endforeach
                </select>

                <x-label for="ref_etablissement_medecin" value="{{ __('Établissement') }}" class="mt-4" />
                <select id="ref_etablissement_medecin" name="ref_etablissement" class="block mt-1 w-full">
                    <option value="choix" disabled selected>Choisissez votre établissement</option>
                    @foreach($etablissements as $etablissement)
                        <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Champs dynamiques pour Partenaire -->
            <div id="partenaire_fields" style="display: none;" class="mt-4">
                <x-label for="poste" value="{{ __('Poste') }}" />
                <x-input id="poste" class="block mt-1 w-full" type="text" name="poste" />

                <x-label for="ref_entreprise" value="{{ __('Entreprise') }}" class="mt-4" />
                <select id="ref_entreprise" name="ref_entreprise" class="block mt-1 w-full">
                    <option value="choix" disabled selected>Choisissez votre entreprise</option>
                    @foreach($entreprises as $entreprise)
                        <option value="{{ $entreprise->id }}">{{ $entreprise->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Bouton -->
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('S\'inscrire') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.getElementById('role').addEventListener('change', function () {
        const role = this.value;
        document.getElementById('etudiant_fields').style.display = (role == 2) ? 'block' : 'none';
        document.getElementById('medecin_fields').style.display = (role == 3) ? 'block' : 'none';
        document.getElementById('partenaire_fields').style.display = (role == 4) ? 'block' : 'none';
    });
</script>
