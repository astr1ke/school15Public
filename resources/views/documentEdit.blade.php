@extends('layouts.layouts')

@section('styles')

    <script src="/modules/ckeditor/ckeditor.js"></script>
    <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .fld {
            background: whitesmoke;
            border-radius: 11px;
            padding: 10px;
            width: max-content;
        }
    </style>
@endsection




@section('content')
    <div class="content">
        <div class="wrapper1">

            <p><h3 id="ca">Редактирование документа и его пункта в основном меню<br/></h3></p>

            <!------- Список ошибок формы ------->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Упс! Что-то пошло не так!</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="form" class="blocks" action="/documentEditPost" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="parents_id" value="{{$document->parents_id}}">
                <div class="fld">
                    <p>
                        <label style="width: max-content">Название пункта:</label>
                        <input type="text" class="text" name="title" value="{{$document->title}}" />
                        <input type="hidden" name="id" value="{{$id}}" />
                    </p>
                </div>
                <br/>
                <p class="area">
                    <textarea class="content" name="content" id="content" rows="10" cols="80">{{$document->content}}</textarea>
                </p>
                <script>
                    CKEDITOR.replace('content')
                </script>
                <p>
                    <input type="submit" class="btn" value="Опубликовать" />
                </p>
            </form>
        </div>
    </div>

@endsection



@section('scripts')
    <script src="/modules/ckeditor/ckeditor.js"></script>
@endsection


