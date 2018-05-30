<?php

namespace App\Http\Controllers;

use App\document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index(){
        return view('documentsAll');
    }

    public function view($id){
        $doc = document::find($id);
        return view('documentViewOne',['document'=>$doc]);
    }

    public function createOpen(){
        return view('documentCreate');
    }

    public function createPost(Request $request){
        if (!(isset($request->content))) {
            $cont = 'Заполните содержимое страницы';//если в поле текст ничего не было введено то заполнить автматически для корректной работы команды create()
        }else{
            $cont = $request->content;
        }
        document::create([
            'title'=>$request->title,
            'content'=>$cont,
        ]);

        return redirect('/documentsAll');
    }

    public function editOpen($id){
        $doc = document::find($id);
        return view('documentEdit',['id'=>$id,'document'=>$doc]);
    }

    public function editPost(Request $request){
        $doc = document::find($request->id);
        $doc->title = $request->title;
        $doc->content = $request->content;
        if ($doc->save())
        return view('/documentsAll');
    }

    public function delete($id){
        document::destroy($id);
        return redirect('/documentsAll');
    }
}
