<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'ibge_state_id',
        'name',
        'uf',
    ];
}
