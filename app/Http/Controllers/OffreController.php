<?php

namespace App\Http\Controllers;

use App\Mail\CandidatureMail;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class OffreController extends Controller
{
    public function index()
    {
        $offres = Offre::latest()->get();
        return view('offre.index', compact('offres'));
    }

    public function create()
    {
        return view('offre.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'salaire' => 'nullable|numeric',
        ]);

        $validatedData['ref_user'] = Auth::id();

        Offre::create($validatedData);

        return redirect()->route('offre.index');
    }

    public function show(Offre $offre)
    {
        return view('offre.show', compact('offre'));
    }

    public function edit(Offre $offre)
    {
        return view('offre.edit', compact('offre'));
    }

    public function update(Request $request, Offre $offre)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'salaire' => 'nullable|numeric',
        ]);

        $offre->update($validatedData);

        return redirect()->route('offre.index');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offre .index');
    }

    public function cloturer(Request $request, Offre $offre)
    {
        $offre->closed = $request->input('closed',0);
        $offre->save();

        return response()->json(['success' => true]);
    }

    public function postuler(Request $request, Offre $offre)
    {
        $request->validate([
            'message' => 'nullable|string|max:3000',
        ]);

        $contenue = $request->input('message');
        $user = Auth::user();
        $mailCreateur = $offre->ref_user->email;

        Mail::to($mailCreateur)->send(new CandidatureMail($user, $contenue, $offre));

        return redirect()->route('offre.show', $offre);
    }

    public function showPostulerForm(Offre $offre)
    {
        return view('offre.postuler', compact('offre'));
    }

}
