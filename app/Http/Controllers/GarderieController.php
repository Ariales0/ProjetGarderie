<?php
/**
 * Namespace pour les controlleurs.
 */
namespace App\Http\Controllers;


use App\Models\Garderie;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Classe controleur GarderieController hérité de Controller.
 */
class GarderieController extends Controller
{
    /**
    * Afficher la liste des garderies.
    */
    public function index()
    {
        $listeGarderies = Garderie::orderby('nom')->get();
        //Pour la liste de selection des province, pour ajouter une province
        $listeProvinces = Province::orderby('Id')->get();

        return view('garderie', compact('listeGarderies','listeProvinces'));
    }

    /**
    * Ajouter une garderie.
    */
    public function ajouter(Request $request)
    {
        Garderie::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'id_province' => $request->province,
            'telephone' => $request->telephone

        ]);
        return redirect('/');
    }

    /**
    * Redirection vers le formulaire de modification de la garderie en lui envoyant l'objet Garderie et le liste des provinces
    */
    public function formulaireModifierGarderie($id)
    {
        $garderie = Garderie::find($id);
        //Pour la liste de selection des province, pour choisir une province
        $listeProvinces = Province::orderby('Id')->get();
        return view('garderieModifier', compact('garderie','listeProvinces'));
    }

    /**
    * Modifier la garderie
    */
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

    /**
    * Supprimer la garderie
    */
    public function delete($id)
    {
        $garderie=Garderie::findOrFail($id);
        $garderie->delete();
        return redirect('/Garderies');
    }

    /**
    * Vider la liste des garderies dans la base de donnes
    */
    public function vider()
    {
        Garderie::truncate();
        return redirect('/');
    }
}
