<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Medecin;
use App\Models\Partenaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function validate($userId)
    {
        $etudiant = Etudiant::where('ref_user', $userId)->first();
        $partenaire = Partenaire::where('ref_user', $userId)->first();
        $medecin = Medecin::where('ref_user', $userId)->first();

        $user = User::findOrFail($userId);
        $user->update(['ref_role' => $etudiant ? 2 : ($partenaire ? 4 : ($medecin ? 3 : 1))]);
        return redirect()->route('admin.index');
    }

    public function reject($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['ref_role' => 1]);
        return redirect()->route('admin.index');
    }
}
