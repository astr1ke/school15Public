<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    protected $fillable = [
        'title','content',
    ];
}
