<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{

    protected $fillable = [
        'articleName', 'description', 'categorie','text','user','categorie_id','pictures',
    ];


    public function user(){
        return $this->belongsTo(user::class);

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



}
