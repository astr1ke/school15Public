<?php

namespace App\Http\Controllers;

use App\document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;

class DocumentController extends Controller
{
    public function index(){
        $parentsDoc = document::where('parents_id',Null)->get();
        $childrenDoc = document::where('parents_id','>=',1)->get()->groupBy('parents_id')->toArray();




        return view('documentsAll',['parentsDoc'=>$parentsDoc,'childrenDoc'=>$childrenDoc]);


    }


    public function view($id){
        $doc = document::find($id);
        $parentsDoc = document::where('parents_id',Null)->get();
        $childrenDoc = document::where('parents_id','>=',1)->get()->groupBy('parents_id')->toArray();
        return view('documentViewOne',['document'=>$doc,'parentsDoc'=>$parentsDoc,'childrenDoc'=>$childrenDoc]);
    }

    public function createOpen(){

        return view('documentCreate',['id'=>Null]);
    }

    public function createSubOpen($id){
        return view('documentCreate',['id'=>$id]);
    }

    public function createPost(Request $request){

        if (!(isset($request->content))) {
            $cont = 'Заполните содержимое страницы';//если в поле текст ничего не было введено то заполнить автматически для корректной работы команды create()
        }else{
            $cont = $request->content;
        }

        if (isset($request->parents_id)){
            document::create([
            'title'=>$request->title,
            'content'=>$cont,
            'parents_id'=>$request->parents_id,
        ]);
        } else {
            document::create([
            'title'=>$request->title,
            'content'=>$cont,
            ]);
        }

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
        $doc->parents_id = $request->parents_id;
        if ($doc->save())
        return redirect('/documentsAll');
    }

    public function delete($id){
        document::destroy($id);
        return redirect('/documentsAll');
    }
}
