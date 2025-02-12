<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    public function user(){
        return $this->belongsTo(Imc::class);
    }
}
