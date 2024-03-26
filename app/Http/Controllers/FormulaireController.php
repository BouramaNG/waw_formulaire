<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    public function ReponseFormulaire(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'service' => 'required',
            'processus_metier' => 'required',
            'description' => 'required',
            'outils_utilises' => 'required',
            'amelioration' => 'required',
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
        ]);
    
        Reponse::create($request->all());
    
        // Récupérer le nom ou l'email de l'utilisateur pour l'afficher dans l'alerte
        $user = $request->nom ?? $request->prenom ?? $request->email;
    
        return redirect()->back()->with('success', 'Réponse enregistrée avec succès.')->with('user', $user);
    }
    
    

}
