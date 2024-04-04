<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class Garderie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nom', 'adresse',"ville","province","telephone"];

    public function province()
    {
        return $this->belongsTo(Province::class,"id_province");
    }

}
