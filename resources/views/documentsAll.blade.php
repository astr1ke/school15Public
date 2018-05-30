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
        <div class="blog" style="margin-bottom: 40px">
            <h4 style="text-align: center; margin-bottom: 25px">Список документации с кратким просмотром</h4>
            <?php $documents = \App\document::all();?>
            @foreach($documents as $document)
                    <div style="background: whitesmoke; border-radius: 8px; height: max-content; padding: 20px; margin-top: 25px" >
                        <p><h4 style="text-align:center">{{$document->title}}</h4></p>
                        <div style="background: white; max-height: 200px;  overflow: auto;padding-left: 60px; margin: 20px">
                            <p>{!!$document->content!!}</p>
                        </div>
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
                    <!--Кнопка просмотреть далее-->
                        <form action="/documentView/{{$document->id}}"  >
                            <button   class="btn fa" style="margin-top:5px; width: 100px" value="Подробнее">Подробнее</button>
                        </form>
                    </div>
            @endforeach
        </div>
    </section>
@endsection