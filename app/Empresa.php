<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome', 'nomeCurto', 'nuit', 'email', 'telemovel1',
        'telemovel2', 'provincia', 'cidade', 'endereco',
    ];
}
