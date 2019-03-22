<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Previlegio extends Model
{
    public function perfies() {
        return $this->belongsToMany('App\Perfil');
    }
}
