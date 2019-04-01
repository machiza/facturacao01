<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Empresa extends Model
{
    /**
     * Get the users for the empresa.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    protected $fillable = [
        'nome', 'nomeCurto', 'nuit', 'email', 'telemovel1',
        'telemovel2', 'provincia', 'cidade', 'endereco',
    ];
}
