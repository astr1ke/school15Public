<?php

namespace App\Http\Controllers;

use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function index(){
        $teachers = teacher::all();
        if (Auth::check() and Auth::user()->IsAdmin ){
            $isAdmin = True;}
        else                                             //узнаем есть ли право у пользователя работать со статьями
            $isAdmin = False;
        return view('teacher',['teachers'=>$teachers,'isAdmin'=>$isAdmin]);
    }

    public function add(){
        return view('teacherCreate');
    }

    public function post(Request $request){

        $this->validate($request, [
            'FIO' =>'required|min:5|max:50',
            'specialization' =>'required|min:3|max:50',
            'about' =>'required|max:800'
        ]);
        $rnd = rand(100,200);
        $file = public_path().'\\images\\teachers\\'.$rnd.$_FILES['foto']['name'];
        $ff = '\\images\\teachers\\'.$rnd.$_FILES['foto']['name'];
        $tmp_name = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($tmp_name, $file);
        //dd($file);
        teacher::create([
            'FIO' => $request->FIO,
            'specialization' => $request->specialization,
            'about' => $request->about,
            'foto' => $ff,
        ]);


        return redirect('/teachers');

    }
}

