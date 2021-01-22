<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

    protected $table = "user";

    protected $fillable = ['access_token'];

    public function kleuren () {
        return $this->hasMany("App\Models\Kleuren");
    }

    public function findIdWithToken($token){
        return $this->where("access_token", "=", $token)->get();
    }
}
