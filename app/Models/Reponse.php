<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','email','service', 'processus_metier', 'description', 'outils_utilises', 'amelioration'];
}
