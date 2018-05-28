<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
        'FIO', 'specialization', 'about','foto',
    ];

}
