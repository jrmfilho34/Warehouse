<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
         protected $fillable = [
        'cadastro_id', 'quantidadeS', 'Destino','autor','data',
    ];
}