<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kleuren;

class CMSController extends Controller
{
    public function index(){
        $users = User::get();
        
        return view('dashboard', ["users" => $users]);
    }

    public function addKleur($id){

        $user = User::find($id);
        foreach($user->kleuren as $kleur){
            $huidigeKleuren[] = $kleur->kleur;
        }

        $nieuweKleuren = ["Blue", "Red", "Yellow", "Green", "Purple", "Pink", "Navy", "Orange", "Gray", "Maroon"];
        $selectieKleuren = array_diff($nieuweKleuren, $huidigeKleuren);

        return view("addKleur", ["selectieKleuren" => $selectieKleuren, "id" => $id]);
    }

    public function storeKleur($id, $kleur){

        $nieuweKleur = new Kleuren();
        $nieuweKleur->kleur = $kleur;
        $nieuweKleur->user_id = $id;
        $nieuweKleur->save();

        return redirect()->route("dashboard");
    }

    public function changeKleur($id){
        $kleur = Kleuren::find($id);
        $user = User::find($kleur->user_id);
        foreach($user->kleuren as $kleur){
            $huidigeKleuren[] = $kleur->kleur;
        }       
        $nieuweKleuren = ["Blue", "Red", "Yellow", "Green", "Purple", "Pink", "Navy", "Orange", "Gray", "Maroon"];
        $selectieKleuren = array_diff($nieuweKleuren, $huidigeKleuren);


        return view("changeKleur", ["selectieKleuren" => $selectieKleuren, "id" => $kleur->id, "user" => $user]);
    }

    public function updateKleur($id, Request $request){
        $kleur = Kleuren::find($id);
        $kleur->kleur = $request->kleur;
        $kleur->save();
        
        return redirect()->route("dashboard");
    }

    public function deleteKleur($id, Request $request){
        $kleur = Kleuren::find($id);
        $kleur->delete();

        return redirect()->route("dashboard");
    }
}
