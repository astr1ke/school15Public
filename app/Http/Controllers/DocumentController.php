<?php

namespace App\Http\Controllers;

use App\document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;

class DocumentController extends Controller
{
    private $count;

    public function __construct(){

        //определение максимального елемента view_id
        $allDoc = document::all();
        $count = 0;
        foreach ($allDoc as $D){
            if ($D->view_id > $count) $count = $D->view_id;
        }
        $this->count = $count;
    }

    public function index(){
        $parentsDoc = document::where('parents_id',Null)->get()->sortBy('view_id');
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
        $view_id = $this->count++;
        return view('documentCreate',['id'=>Null,'view_id'=>$view_id]);
    }

    public function createOpenAfter($id){
        $doc = document::where('view_id','>',$id)->get();
        foreach ($doc as $d){
            $da = document::where('view_id',$d->view_id)->first();
            $da->view_id ++;
            $da->save();
        }
        $id++;
        return view('documentCreate',['id'=>Null,'view_id'=>$id]);
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
            'view_id'=> $request->view_id,
        ]);
        } else {
            document::create([
            'title'=>$request->title,
            'content'=>$cont,
            'view_id'=> $request->view_id,
            ]);
        }

        return redirect('/documentsAll');
    }

    public function createPostAfter(Request $request){



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
                'view_id'=> $this->count++,
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
