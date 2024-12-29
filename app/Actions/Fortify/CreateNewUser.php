<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Medecin;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'in:2,3,4'],
            'cv' => $input['role'] == 2 ? ['required', 'file', 'mimes:pdf,doc,docx'] : ['nullable'],
            'etude' => $input['role'] == 2 ? ['required', 'string', 'max:255'] : ['nullable'],
            'ref_etablissement' => $input['role'] == 2 || $input['role'] == 3 ? ['required', 'exists:etablissements,id'] : ['nullable'],
            'ref_specialite' => $input['role'] == 3 ? ['required', 'exists:specialites,id'] : ['nullable'],
            'ref_hopital' => $input['role'] == 3 ? ['required', 'exists:hopitaux,id'] : ['nullable'],
            'poste' => $input['role'] == 4 ? ['required', 'string', 'max:255'] : ['nullable'],
            'ref_entreprise' => $input['role'] == 4 ? ['required', 'exists:entreprises,id'] : ['nullable'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Créer l'utilisateur
        $user = User::create([
            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'ref_role' => 1,
        ]);

        // Enregistrer les données spécifiques selon le rôle
        if ($input['role'] == 2) {
            Etudiant::create([
                'ref_user' => $user->id,
                'cv' => $input['cv']->store('cvs'),
                'etude' => $input['etude'],
                'ref_etablissement' => $input['ref_etablissement'],
            ]);
        } elseif ($input['role'] == 3) {
            Medecin::create([
                'ref_user' => $user->id,
                'ref_specialite' => $input['ref_specialite'],
                'ref_hopital' => $input['ref_hopital'],
                'ref_etablissement' => $input['ref_etablissement'],
            ]);
        } elseif ($input['role'] == 4) {
            Partenaire::create([
                'ref_user' => $user->id,
                'poste' => $input['poste'],
                'ref_entreprise' => $input['ref_entreprise'],
            ]);
        }

        return $user;
    }
}
