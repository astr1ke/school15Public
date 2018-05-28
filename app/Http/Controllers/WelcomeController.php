<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

class WelcomeController extends Controller
{
    public function index(){
        $a= article::latest()->get();//получили модель статей из базы, перевели в массив
        $articles1 = $a->slice(0,3); //поменяли порядок и взяли первые(последние) новости
        $articles2 = $a->slice(3,3);
        return view('welcome', ['articles1'=>$articles1,'articles2'=>$articles2]);

    }
}
