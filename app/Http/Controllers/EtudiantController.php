<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;

class EtudiantController extends Controller
{
    public function index(){
       $etudiants=Etudiant::orderBy("lastName", "asc") ->paginate(5);
        return view("etudiant", compact("etudiants"));
    }

    public function create(){
        $classes=Classe::all();
         return view("createEtudiant", compact("classes"));
     }

     public function edit(Etudiant $etudiant) 
    {
    $classes = Classe::all();
    return view("editEtudiant", compact("etudiant", "classes"));
    }


     public function ajouter(Request $request){
        $request ->validate([
         "firstName"=>"required",
         "lastName"=>"required",
         "classe_id"=>"required"
        ]);
       // Etudiant::create($request->all());

        Etudiant::create([
            "firstName"=>$request->firstName,
            "lastName"=>$request->lastName,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success", "Etudiant ajouté avec succé!");
     }

     public function delete(Etudiant $etudiant){
    $nom_complet =$etudiant->firstName." ".$etudiant->lastName;
     $etudiant->delete();

     return back()->with("successDelete", "Vous vennez de Supprimer l'étudiant $nom_complet");
    }
    // On peut faire aussi l'injectio des dependences
     //public function delete($etudiant){
       // Etudiant::find($etudiant)->delete();
  
       // return back()->with("successDelete", "Vous vennez de Supprimer un Etudiant");
      // }



      public function update(Request $request, Etudiant $etudiant){
        $request ->validate([
         "firstName"=>"required",
         "lastName"=>"required",
         "classe_id"=>"required"
        ]);
        $etudiant-> update([
            "firstName"=>$request->firstName,
            "lastName"=>$request->lastName,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success", "Etudiant mise à jour  avec succé!");
     }
}
