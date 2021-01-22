<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kleuren;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        return User::with('kleuren')->get();
    }

    public function store(){
        $user = new User();
        $user->access_token = Str::random(60);
        $user->save();
        $this->setKleuren($user);
        return $user;
    }

    public function setKleuren ($user) {
        $blue = new Kleuren();
        $blue->user_id = $user->id;
        $blue->kleur = "Blue";
        $blue->save();

        $red = new Kleuren();
        $red->user_id = $user->id;
        $red->kleur = "Red";
        $red->save();
    }

    public function getIdWithToken($token){
        $user = new User();
        return $user->findIdWithToken($token);
    }

    public function show($id){
        return User::find($id);
    }

    public function delete(Request $request, $id){
        $user = User::find($id);
        $user->kleuren()->delete();

        $user->delete();

        return 204;
    }

    public function kleuren ($id) {
        $user = User::find($id);
        return $user->kleuren;
    }
}
