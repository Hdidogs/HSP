<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('admin.index');
    }

    public function show()
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('admin.show');
    }
}