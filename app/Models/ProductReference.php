<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReference extends Model
{
    protected $fillable=[
        'designation','description','image','type','idActor'
    ];
}
