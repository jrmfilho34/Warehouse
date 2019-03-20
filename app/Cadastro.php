<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
        protected $fillable = [
        'Nproduto', 'data', 'grupo','unidade','valor','quantidade',
    ];
}
