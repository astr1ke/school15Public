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

        .fld2 {
            background: whitesmoke;
            border-radius: 11px;
            padding: 15px;
            width: max-content;
            height: 82px;
            margin-bottom: 15px;
        }

    </style>
@endsection

@section('content')
    <div class="content">
        <div class="wrapper1">

            <p><h3 id="ca">Создание статьи<br/></h3></p>

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

                <form id="form" class="blocks" action="/article" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="fld">
                        <p>
                            <label >Заголовок:</label>
                            <input type="text" class="text" name="articleName" />
                        </p>
                        <p>
                            <label >Категория:</label>
                            <select class="sel" name="categorie" size="1">\
                                <?php $i=0 ?>
                                @foreach($categorieSelect as $catSel)
                                    @if($i==0)
                                        <option selected value='{{$catSel->categorie}}'>{{$catSel->categorie}}</option>
                                        <?php $i++ ?>
                                    @else
                                    <option value='{{$catSel->categorie}}'>{{$catSel->categorie}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <br/>
                    <p class="area">
                        <textarea class="text" name="text" id="text" rows="10" cols="80"></textarea>
                    </p>
                    <div class="fld2">
                        <p>
                            <label id="lp">Фото для заголовка:</label>
                            <input id="img" type="file"  name="file">
                        </p>
                        <script>
                            CKEDITOR.replace('text')
                        </script>
                    </div>
                    <p>
                        <label>&nbsp;</label>
                        <input type="submit" class="btn" value="Опубликовать" />
                    </p>
                    <input type="hidden" name = "user" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" />
                </form>
        </div>
    </div>

@endsection



@section('scripts')
    <script src="/modules/ckeditor/ckeditor.js"></script>
@endsection
