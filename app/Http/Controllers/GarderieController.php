<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GarderieController extends Controller
{
    public function index()
    {
        $listeGarderies = Garderie::orderby('title')->get();

        return view('garderie', compact('listeGarderies'));
    }

    public function ajouter(Request $request)
    {
        
    }

    public function formulaireModifierGarderie($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $garderie = Garderie::findOrFail($id);
        $garderie->update([
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'province' => $request->province,
            'telephone' => $request->telephone
        ]);
        return redirect('/');
    }

    public function delete($id)
    {
        $garderie = Garderie::find($id);
        $garderie->delete();
        return redirect('/');
    }

    public function vider()
    {
        $garderies = Post::find($id);
        return redirect('/');
    }
}
