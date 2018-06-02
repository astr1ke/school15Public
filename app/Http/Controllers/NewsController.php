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
        if (isset($user) and $user->IsAdmin ){
            return True;}
        else                                             //узнаем есть ли право у пользователя работать со статьями
            return False;
    }

    public function categorieView($cat,$id){ //Отображение статей с определенными сатегориями

        $art = article::where('categorie',$cat)->latest()->get();// получение необходимых статей
        $st = ceil((count($art))/5); //получения количеста страниц для отображения новостей
        $art = $art->slice(($id-1)*5,5);

        if (Auth::check() and Auth::user()->IsAdmin ){
            $isAdmin = True;}
        else                                             //узнаем есть ли право у пользователя работать со статьями
            $isAdmin = False;
        $c = $cat;  //передаем в вид название выбранной сатегории для шапки
        $cat = categorie::all();


        return view('newsAll',['news'=>$art,'st'=>$st,'id'=>$id,'isAdmin'=>$isAdmin,'categories'=>$cat,'c'=>$c]);
    }

    public function delete ($id){
        Comment::where('article_id',$id)->delete();
        article::where('id',$id)->delete();
        return redirect('/news/1');

    }

    public function view($id){
        $news = article::where('id', $id)->get();


        if (Auth::check() and Auth::user()->IsAdmin ){
            $isAdmin = True;}
        else                                             //узнаем есть ли право у пользователя работать со статьями
            $isAdmin = False;
        $cat = categorie::all();

        return view('newsView',['news'=>$news,'st'=>1,'id'=>$id,'isAdmin'=>$isAdmin,'categories'=>$cat]);
    }
}
