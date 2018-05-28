<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'title', 'img','categorie',
    ];
}
