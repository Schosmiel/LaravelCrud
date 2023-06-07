<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable=['firstName', 'lastName', 'classe_id' ];
    public function Classe(){
     return $this -> belongsTo(Classe::class);
    }
}
