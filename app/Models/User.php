<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function imc(){
        return $this->HasMany(Imc::class);
    }
}
