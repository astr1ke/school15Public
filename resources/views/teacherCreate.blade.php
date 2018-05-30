<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/logo.jpg" type="image/x-icon">
    <title>Средняя школа №15</title>

    <!----------------------------------------- подключаем стили ------------------------------------------->

    <!-- подключаем boostrap -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

    <script src="/modules/ckeditor/ckeditor.js"></script>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/header_block.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css')}}/school.css?1517413835" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css')}}/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('css')}}/nyroModal.css" media="all">

    <style type="text/css">
        .fld {
            background: whitesmoke;
            border-radius: 11px;
            padding: 10px;
            width: max-content;

        }
        .txtarea {
            border-radius: 11px;
        }
    </style>



</head>



<body>
<!-- header -->
<div id="header" >
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="header-social">
                    <script src="//ulogin.ru/js/ulogin.js"></script>
                    <div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2F;mobilebuttons=0;"></div>
                </div>
                <div class="fzinfo-link"><a href="http://school.wunderpark.ru/svedeniya-ob-obrazovatelnoj-org"></a></div>
                @if (!(Auth::check()))
                    <div class="signup">
                        <a class="btn-flat nyroModal" href="/login" >Войти на сайт</a>
                    </div>
                @else
                    <div class="signup">
                        <a class="btn-flat nyroModal" href="/logout" >Выйти с сайта</a>
                    </div>
                @endif
            </div>
            <div class="col-xs-4">
                <div class="top-logo">
                    <a rel='nofollow'  class="top-logo-link" href="/">Школа №15 </a>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="phone">Тел.: +7 (86140) 67251
                    <div class="address"><a href="/contacts">село Коноково, улица Донская,5.</a></div>
                </div>
                <div class="callback">
                    <a class="nyroModal" href="/ajax/modal/callback" onclick="yaCounter30740753.reachGoal('zakaz_zvonka'); return true;">Отправить нам E-mail</a>
                </div>
            </div>
        </div>
        <!-- menu -->
        <div id="main_menu" class="row">
            <div class="col-md-12">
                <ol class="main-menu-list">
                    <li><a href="/" >Главная</a></li>

                    <li><a href="/about" >О школе</a><ul>
                            <li><a href="/about">О школе</a></li>
                            <li><a href="/teachers">Наши педагоги</a></li></ul></li>

                    <li><a href="/news/1" >Жизнь школы</a><ul>
                            <li><a href="/news/1" >События</a></li>
                            <li><a href="/gallery">Фотогалерея</a></li></ul></li>

                    <li><span>Наши возможности</span><ul>
                            <li><a href="http://school.wunderpark.ru/360-gradusov-obrazovatel-nogo-pr">Кружки</a></li>
                            <li><a href="http://school.wunderpark.ru/wundercity">Дополнительные занятия</a></li>
                            <li><a href="http://school.wunderpark.ru/gamepark">Детская площадка</a></li>
                            <li><a href="http://school.wunderpark.ru/stadium">Стадион</a></li>
                            <li><a href="http://school.wunderpark.ru/lab">Тепличный комплекс</a></li></ul></li>

                    <li><span>Документация</span><ul>
                            <li><a href="/shcool-documentation">Школьная документация</a></li>
                            <li><a href="/learner">Для учителей</a></li></ul></li>

                    <li><a href="/contacts" >Контакты</a></li>			</ol>
            </div>
        </div>
    </div>
</div>
</header>

<div class="content">
    <div class="wrapper">

        <p><h3 id="ca">Добавление учителя<br/></h3></p>

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

        <form id="form" class="blocks" action="/addTeacherPost" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="fld">
                <p>
                    <label >ФИО:</label>
                    <input type="text" class="text" name="FIO" />
                </p>
                <p><label>Специальн.</label>
                    <input type="text" class="text" name="specialization" />
                </p>
            </div>
            <br/>
            <p><label>Описание</label></p>
            <br/>
            <br/>
            <p class="area">
                <textarea class="txtarea" name="about" rows="10" cols="80"></textarea>
            </p>
            <div class="fld">
                <p>
                    <label id="lp">Фото(200на200):</label>
                    <input id="img" type="file"  name="foto">
                </p>
            </div>
            <p>
                <label>&nbsp;</label>
                <input type="submit" class="btn" value="Опубликовать" />
            </p>
            <input type="hidden" name = "user" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" />
        </form>
    </div>
</div>

@include('layouts.footer')

<!-------------------------подключаем скрипты ---------------------------------------->
<!--подключаем jquery -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<!-- подключаем bootstrap.js -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<script type="text/javascript" src="{{asset('js')}}/school.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.nyroModal.custom.min.js"></script>
<script src="//ulogin.ru/js/ulogin.js"></script>







</body>

</html>
