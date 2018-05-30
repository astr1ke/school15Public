@extends('layouts.layouts')
@section('content')
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
                <div class="col-md-8">

                    <div style=" border-radius: 8px" >
                        <p><h4 style="text-align:center">{{$document->title}}</h4></p>
                        <p>{!!$document->content!!}</p>
                        @if (Auth::check() and Auth::user()->IsAdmin == 1)
                        <!--Кнопка удалить-->
                            <form action="/documentDelete/{{$document->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button  class="btn fa" style="margin-top: 5px; width: 100px " value="Удалить меню">Удалить меню</button>
                            </form>
                            <!--Кнопка редактировать-->
                            <form action="/documentEditOpen/{{$document->id}}"  >
                                <button   class="btn fa" style="margin-top:5px; width: 100px" value="Редактировать меню">Редактир меню</button>
                            </form>
                        @endif
                    </div>
                </div>

                <aside class="col-md-4">
                    <!--Вывод -списка документов-->
                    <div class="widget categories" style="float: right">
                        <h3>Документация</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category" style="max-width: 250px; width: max-content">
                                <?php $documents = \App\document::all();?> <!-- Получение списка документов для охображения их заголовков в меню-->
                                    @foreach($documents as $document)
                                        <li><a href="/documentView/{{$document->id}}">{{$document->title}}</a></li>
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