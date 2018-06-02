<?php

namespace App\Http\Controllers;

use App\article;
use App\categorie;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class NewsController extends Controller
{
    public function index(){
        $art = article::paginate(5);
        $cat = categorie::all();
        $isAdmin = $this->isLoginAdmin(Auth::user());
        return view('newsAll',['news'=>$art,'isAdmin'=>$isAdmin,'categories'=>$cat]);
    }

    private function isLoginAdmin($user){
        if (isset($user) and $user->IsAdmin ){return True;}
        else  return False ; //узнаем есть ли право у пользователя работать со статьями
    }

    public function categorieView($cat){ //Отображение статей с определенными сатегориями
        $art = article::where('categorie',$cat)->paginate(5);
        $c = $cat;
        $cat = categorie::all();
        $isAdmin = $this->isLoginAdmin(Auth::user());
        return view('newsAll',['news'=>$art, 'isAdmin'=>$isAdmin,'categories'=>$cat,'c'=>$c]);
    }

    public function delete ($id){
        Comment::where('article_id',$id)->delete();
        article::where('id',$id)->delete();
        return redirect('/news');

    }

    public function view($id){
        $news = article::where('id', $id)->get();
        $isAdmin = $this->isLoginAdmin(Auth::user());
        $cat = categorie::all();
        return view('newsView',['news'=>$news,'st'=>1,'id'=>$id,'isAdmin'=>$isAdmin,'categories'=>$cat]);
    }
}
