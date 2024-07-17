<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidad';
    protected $fillable = [
        'id', 'name', 'abbrev', 'country'
    ];
}
