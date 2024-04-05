<?php

namespace App\Http\Controllers;


use App\Models\Garderie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GarderieController extends Controller
{
    public function index()
    {
        $listeGarderies = Garderie::orderby('nom')->get();

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
        $garderie=Garderie::findOrFail($id);
        //dd($garderie);
        try {
            $garderie->delete();
        } catch (\Exception $e) {
            dd($e->getMessage()); // Affiche l'erreur
        }
        //DB::table('garderies')->where('Id', $id)->delete();
        return redirect('/Garderies');
    }

    public function vider()
    {
        Garderie::truncate();
        return redirect('/');
    }
}
