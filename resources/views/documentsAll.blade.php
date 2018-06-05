@extends('layouts.layouts')
@section('content')

    <hr>
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li>Документация</li>
            </div>
        </div>
    </div>

    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                <div class="col-md-8" style="width: 78.66666665%">
                    <div style=" border-radius: 8px" >

                        <h4 style="text-align: center; margin-bottom: 25px">Список документации с кратким просмотром</h4>
                        <?php $documents = \App\document::all();?>
                        @foreach($documents as $document)

                            <div class="art">
                                <div class="blog-item">
                                    <div class="row" style="background: whitesmoke; border-radius: 20px">

                                        <div class="col-xs-12 col-sm-2" style="width: 130px">
                                            <div class="entry-meta">
                                                <span id="publish_date">-{{$document->id}}-</span>
                                                <span><i class="fa fa-user"></i> <a>{{$document->created_at}}</a></span>
                                                @if (Auth::check() and Auth::user()->IsAdmin == 1)
                                                <!--Кнопка удалить-->
                                                    <form action="/documentDelete/{{$document->id}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button  class="btn fa" style="margin-top: 5px; margin-left: 5px; width: 100px " value="Удалить">Удалить</button>
                                                    </form>
                                                    <!--Кнопка редактировать-->

                                                    <form action="/documentEditOpen/{{$document->id}}"  >
                                                        <button   class="btn fa" style="margin-top:5px; margin-left: 5px; width: 100px" value="Редактировать">Редактир.</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>

                                        <div style="border-radius: 8px; height: max-content; padding-right: 15px" >
                                            <p><h4 style="text-align: left ">{{$document->title}}</h4></p>
                                            <div style="background: white; max-height: 200px;  overflow: auto;  border: 2px solid grey; border-radius: 5px">
                                                <p>{!!$document->content!!}</p>
                                            </div>
                                            <!--Кнопка просмотреть далее-->
                                            <div style="margin-left: 14%">
                                            <form action="/documentView/{{$document->id}}"  >
                                                <button   class="btn fa" style="margin-top:5px; width: 100px" value="Подробнее">Подробнее</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <aside class="col-md-4" style="width: 21.333333%">
                    <!--Вывод -списка документов-->
                    <div class="widget categories" style="float: right ">
                        <h3>Документация</h3>
                        <div class="row" >
                            <div class="col-sm-6" >
                                <ul class="blog_category" style="width: max-content">
                                <?php $documents = \App\document::all();?> <!-- Получение списка документов для охображения их заголовков в меню-->
                                    @foreach($documents as $document)
                                        <li ><a href="/documentView/{{$document->id}}">{{$document->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

@endsection