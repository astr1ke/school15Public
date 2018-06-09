@extends('layouts.layouts')
@section('styles')
    <!--Стили коментариев-->
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('comments/css')}}/comments.css" />
    <style type="text/css">
        .art {
            background: whitesmoke;
            border-radius: 10px;
        }
        .txt {

            margin-right: 30px;
        }
    </style>
@endsection

@section('content')
<div class="content">

    <hr>
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                @foreach($news as $newS)
                    <li>Жизнь школы</li>
                    <label><a>{{' / '.$newS['articleName']}}</a></label>
                @endforeach
            </div>
        </div>
    </div>


    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                <div class="col-md-8">

                    @foreach($news as $n)
                        <div class="art">
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2">
                                        <div class="entry-meta">
                                            <span id="publish_date">{{$n['created_at']}}</span>
                                            <span><i class="fa fa-user"></i> <a href="#">{{$n['user']}}</a></span>
                                            <span><i class="fa fa-comment"></i> <a href="#">{{count(\App\article::find($n['id'])->comments).' коммент.' }}</a></span>
                                            @if ($isAdmin)
                                                <form action="/articleDelete/{{$n->id}}" method="post" >
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button  class="btn fa" onClick="return confirm('Вы подтверждаете удаление?');" style="margin-top: 5px; width: 100px " value="Удалить статью">Удалить ст.</button>
                                                </form>
                                            @endif

                                            @if ($isAdmin)
                                                <form action="/articleEdit/article/{{$n->id}}"  >
                                                    <button   class="btn fa" style="margin-top:5px; width: 100px" value="Редактировать статью">Редактир ст.</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-10 blog-content">
                                        <div class="pict">
                                            <a href="{{$n['pictures']}}"class="html5lightbox"><img class="img-responsive img-blog" src="{{$n['pictures']}}" width="100%" alt="" /></a>
                                        </div>
                                        <h4>{{$n['articleName']}}</h4>
                                        <div class="txt">
                                            <p>{!!$n['text']!!}</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @include('comments.comments_block', ['essence' => $n])
                @endforeach




                <!--/.blog-item-->



                </div>
                <!--/.col-md-8-->

                <aside class="col-md-4">

                    <!--Поиск-->
                    <div class="widget search">
                        <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                        </form>
                    </div>

                    <div class="widget categories">
                        <h3>Выбор по категориям</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                    <li><a href="/news/1">Все<span class="badge">{{\App\article::all()->count()}}</span></a></li>
                                @foreach($categories as $categorie)
                                    <!--Получение колекции нужных статей -->
                                        <?php
                                        $art = \App\article::where('categorie',$categorie->categorie)->get();
                                        $count = $art->count();
                                        ?>
                                        <li><a href="<?php
                                            if(($art->count())>0) {
                                                echo("/news/categories/$categorie->categorie/1");
                                            }
                                            ?>">{{$categorie->categorie}}<span class="badge">{{$count}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/.categories-->


                    <div class="widget blog_gallery">
                        <h3>Галерея</h3>
                        <ul class="sidebar-gallery">
                            <?php $pict = \App\article::all();
                            $i=0;
                            foreach($pict as $p){
                                $i++;
                                if (!($i>18)){
                                    echo ("<li><a href=\"$p->pictures\"class=\"html5lightbox\" data-group=\"galary\"><img src=\"$p->pictures\" width=\"105\" height=\"71\" alt=\"\" /></a></li>");
                                }else break;
                            }
                            ?>
                        </ul>
                    </div>
                    <!--/.blog_gallery-->
                </aside>
            </div>
            <!--/.row-->
        </div>
    </section>
    <!--/#blog-->
    <script>
        $("a").attr("href").addClass("html5lightbox");
    </script>
</div>
@endsection