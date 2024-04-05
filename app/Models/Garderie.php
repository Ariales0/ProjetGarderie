<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garderie extends Model
{

    protected $primaryKey = 'Id'; // Définit le nom de la clé primaire
    
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nom', 'adresse',"ville","telephone","id_province"];

    public function province()
    {
        return $this->belongsTo(Province::class,"id_province");
    }

}
