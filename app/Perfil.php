<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function previlegios() {
        return $this->belongsToMany('App\Previlegio');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
    ];
}
