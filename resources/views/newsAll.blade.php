<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Коноковская Школа №15</title>
    <link rel="shortcut icon" href="/images/logo.jpg" type="image/x-icon">

   @include('layouts.stiles')

<!--Выбираем цвет фона сообщений и отступы поля-->
    <style type="text/css">
        .art {
            background: whitesmoke;
            border-radius: 11px;
        }
        .pict {
            margin-right: 10px;
        }
        .txt {
            margin-right: 30px;
        }
    </style>

</head>
@include('layouts.header')
<body>

<hr>
<div id="breadcrumb" style="position: relative; z-index: 500px">
    <div class="container">
        <div class="breadcrumb">
            <li>Жизнь школы</li>
            <?php if(isset($c)){
                echo("- $c");
            }?>
            @if($isAdmin)
                <li><a href="/articles">Добавить статью</a></li>
            @endif
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
                                            <span id="publish_date">{{$n->created_at}}</span>
                                            <span><i class="fa fa-user"></i> <a href="#">{{$n->user}}</a></span>
                                            <span><i class="fa fa-comment"></i> <a href="#">{{count(\App\article::find($n->id)->comments) .' коммент.'}}</a></span>
                                            @if ($isAdmin)
                                                <form action="/articleDelete/{{$n->id}}" method="post" >
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button  class="btn fa" style="margin-top: 5px; width: 100px " value="Удалить статью">Удалить ст.</button>
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
                                        <h4>{{$n->articleName}}</h4>
                                        <div class="pict">
                                            <a href="{{$n->pictures}}" class="html5lightbox" data-group="news" ><img class="img-responsive img-blog" src="{{$n->pictures}}" width="100%" alt="" /></a>
                                        </div>

                                        <div class="txt">

                                            <?php   $txt = preg_replace ('/<img.*>/Uis', '', $n->text);
                                                    $txt = preg_replace('/\s{2,}/', '', $txt);
                                                    $txt = mb_strimwidth($txt,0,300,'...')
                                            ?> <!---  обрезаем колво символов для превью статей на главной --->

                                            <p>{!!$txt!!}</p>
                                        </div>

                                        <form action="/articleNews/{{$n->id}}" >
                                         <button class="btn btn-primary readmore" value="Читать далее">Читать далее  <i class="fa fa-angle-right"></i></button>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!--Пагинация(вывод строки с номерами страниц)-->

                    <ul class="pagination pagination-lg">
                      {{$news->links('vendor.pagination.default')}}
                    </ul>
                </div>


                <aside class="col-md-4">

                    <!--Поиск-->
                    <div class="widget search">
                        <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                        </form>
                    </div>


                    <!-- Вывод последних коментариев сайта-->
                    <div class="widget categories">
                        <h3>Последние коментарии</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single_comments">

                                    <!-- Получение последних пяти коментариев -->
                                    <?php
                                    $cmts = \App\Comment::all();
                                    $cmts = $cmts->slice(-5,5);
                                    ?>

                                    <!-- Вывод на экран названий статей и их комментариев-->
                                    @foreach($cmts as $cmt)
                                        <div  style="background: whitesmoke; border-radius: 11px; margin-top: 10px; height: 85px; padding: 5px 15px 5px 15px;">
                                            <img src="/images/blog/avatar3.png" alt="" />
                                            <div style="float: bottom; padding: 20px 5px 20px 15px;" >
                                                <p><a href="/articleNews/{{$cmt->article->id}}">{{mb_strimwidth(($cmt->text),0,60,'...')}}</a></p>
                                                <div class="entry-meta small muted" style="float: right;">
                                                    <span>Отправлено <a href="#">{{$cmt->name}}</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--Вывод категорий статей-->
                    <div class="widget categories">
                        <h3>Выбор по категориям</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                    <li><a href="/news">Все<span class="badge">{{\App\article::all()->count()}}</span></a></li>
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


                    <!--------Галерея-------->
                    <div class="widget blog_gallery">
                        <h3>Галерея</h3>
                        <ul class="sidebar-gallery">
                            <?php $pict = \App\article::all();
                            $i=0;
                            foreach($pict as $p){
                                $i++;
                                if (!($i>18)){
                                    echo ("<li><a href=\"$p->pictures\" class=\"html5lightbox\" data-group=\"galary\"><img src=\"$p->pictures\" width=\"105\" height=\"71\" alt=\"\" /></a></li>");
                                }else break;
                            }
                            ?>
                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </section>

    @include('layouts.footer')
    @include('layouts.scripts')

</body>

</html>
