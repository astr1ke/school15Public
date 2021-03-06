@extends('layouts.layouts')
@section('content')
<div class="content">
    <hr>
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li>Документация</li>
                @if((\Illuminate\Support\Facades\Auth::check()) and (\Illuminate\Support\Facades\Auth::user()->IsAdmin))
                    <li><a href="/documentCreateOpen">Добавить</a></li>
                @endif
            </div>
        </div>
    </div>

    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                <div class="col-md-8" style="width: 78.66666665%">
                    <div style=" border-radius: 8px" >


                        @if((\Illuminate\Support\Facades\Auth::check()) and (\Illuminate\Support\Facades\Auth::user()->IsAdmin))

                            <h4 style="text-align: center; margin-bottom: 25px">Редактор меню</h4>
                            <?php $documents = \App\document::all();?>
                            @foreach($parentsDoc as $pD)

                                <!--Прорисовка родительских объектов-->
                                <div class="art">
                                    <div class="blog-item" style="margin-bottom: 10px; margin-top: 30px" >
                                        <div class="row" style="background: whitesmoke; border-radius: 20px">
                                            <div class="col-xs-12 col-sm-2" style="width: 130px">
                                                <div class="entry-meta">
                                                    <span id="publish_date" style="background: grey">{{$pD->created_at}}</span>
                                                </div>
                                            </div>

                                            <div style="border-radius: 8px; height: max-content; padding-right: 15px; padding-top: 3px" >

                                                <p style="text-align: left; font-size: 17.5px">{{$pD->title}}</p>
                                                <div>

                                                     @if (Auth::check() and Auth::user()->IsAdmin == 1)

                                                    <!--Кнопка удалить-->
                                                    <form action="/documentDelete/{{$pD->id}}" method="post" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button  class="btn fa" onClick="return confirm('Вы подтверждаете удаление?');" style="margin-right: 15px; margin-left: 5px; width: 34px " value="Х">X</button>
                                                    </form>

                                                    <!--Кнопка редактировать-->
                                                    <form action="/documentEditOpen/{{$pD->id}}" style="display: inline-block; align: right" >
                                                        <button   class="btn fa" style="margin-left: 15px; width: 80px" value="Редактировать">Редактир.</button>
                                                    </form>

                                                    <!--Кнопка создать раздел после данного раздела-->
                                                    <form action="/documentCreateOpenAfter/{{$pD->view_id}}" style="display: inline-block" >
                                                        <button   class="btn fa" style="margin-left: 25px; width: 190px" value="Создать подразд.">Создать после этого поля</button>
                                                    </form>

                                                    <!--Кнопка создать подраздел-->
                                                    <form action="/documentSubCreateOpen/{{$pD->id}}" style="display: inline-block" >
                                                        <button   class="btn fa" style="margin-right: 15px; width: 160px" value="Создать подразд.">Создать подраздел </button>
                                                    </form>

                                                    @endif

                                                    <!--Кнопка просмотреть далее-->
                                                    <form action="/documentView/{{$pD->id}}" style="display: inline-block; align: right" >
                                                        <button   class="btn fa" style=" margin-left: 25px; width: 90px" value="Подробнее">Открыть</button>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Прорисовка дочерних объектов-->
                                @if(isset($childrenDoc[$pD->id]))
                                    @foreach($childrenDoc[$pD->id] as $cD)
                                        <div class="art" style="margin-left: 50px">
                                            <div class="blog-item" style="margin-bottom: 10px">
                                                <div class="row" style="background: whitesmoke; border-radius: 20px">

                                                    <div class="col-xs-12 col-sm-2" style="width: 130px">
                                                        <div class="entry-meta">
                                                            <span id="publish_date" style="background: grey">{{$cD['created_at']}}</span>
                                                        </div>
                                                    </div>

                                                    <div style="border-radius: 8px; height: max-content; padding-right: 15px; padding-top: 3px" >

                                                        <p style="text-align: left; font-size: 17.5px">{{$cD['title']}}</p>
                                                        <div>

                                                            @if (Auth::check() and Auth::user()->IsAdmin == 1)
                                                                <!--Кнопка удалить-->
                                                                <form action="/documentDelete/{{$cD['id']}}" style="display: inline-block" method="post">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button  class="btn fa" onClick="return confirm('Вы подтверждаете удаление?');" style="margin-right: 15px; margin-left: 5px; width: 34px " value="Удалить">X</button>
                                                                </form>
                                                                <!--Кнопка редактировать-->
                                                                <form action="/documentEditOpen/{{$cD['id']}}" style="display: inline-block" >
                                                                    <button   class="btn fa" style="margin-left: 15px; margin-right: 20px; width: 80px" value="Редактировать">Редактир.</button>
                                                                </form>

                                                            @endif
                                                                <!--Кнопка просмотреть далее-->
                                                                <form action="/documentView/{{$cD['id']}}" style="display: inline-block" >
                                                                    <button   class="btn fa" style="width: 90px" value="Подробнее">Открыть</button>
                                                                </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            @endforeach
                        @else

                            <h4 style="text-align: center; margin-bottom: 45px">Обзор документации</h4>
                            <?php $documents = \App\document::all();?>
                            @foreach($parentsDoc as $pD)

                            <!--Прорисовка родительских объектов-->
                                        <div class="row" style="margin-left: 30px;margin-top: 3px">
                                            <div style="border-radius: 8px; width: 450px; height: 40px; background: whitesmoke; margin: 5px; padding: 8px" >
                                                <p style="text-align: left; font-size: 17.5px"><a href="/documentView/{{$pD->id}}">{{$pD->title}}</a></p>
                                            </div>
                                        </div>
                                <!--Прорисовка дочерних объектов-->
                                @if(isset($childrenDoc[$pD->id]))
                                    @foreach($childrenDoc[$pD->id] as $cD)
                                                <div class="row" style="margin-left: 100px">
                                                    <div style="border-radius: 8px; width: 450px; height: 40px; background: whitesmoke; margin: 3px; padding: 8px" >
                                                        <p style="text-align: left; font-size: 17.5px"><a href="/documentView/{{$cD['id']}}">{{$cD['title']}}</a></p>
                                                    </div>
                                                </div>
                                    @endforeach
                                @endif
                            @endforeach

                        @endif

                    </div>
                </div>

                <aside class="col-md-4" style="width: 21.333333%">
                    <!--Вывод -списка документов-->
                    <div class="widget categories" style="float: right ">
                        <h3>Навигация</h3>
                        <div class="row" >
                            <div class="col-sm-6" >
                                <ul class="blog_category" style="width: max-content; max-width: 230px">
                                    @foreach($parentsDoc as $pD)
                                        <!--отрисовка родительских объектов-->
                                        <li style="margin-top: 15px; margin-bottom: 10px" ><a href="/documentView/{{$pD->id}}">{{$pD->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>
@endsection