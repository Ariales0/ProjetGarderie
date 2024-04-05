<?php
/**
 * Namespace pour les models
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe model Gaderie herite de Model
 */
class Garderie extends Model
{
    /** 
    * Nom de la clé primaire
    */
    protected $primaryKey = 'Id'; // Définit le nom de la clé primaire
    
    use HasFactory;

    /** 
    * Pas de timestamps
    */
    public $timestamps = false;

    /** 
    * Champs de la table ajoutable
    */
    protected $fillable = ['nom', 'adresse',"ville","telephone","id_province"];

    /** 
    * Fonction de relation entre id_province de la table garderies et Id de la table provinces
    * 
    * @return Province 
    */
    public function province()
    {
        return $this->belongsTo(Province::class,"id_province");
    }

}
