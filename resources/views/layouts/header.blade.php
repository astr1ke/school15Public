
   <!-- header -->
<header>
    <div id="header" style="position: relative; margin-bottom: 20px;" >
        <nav class="navbar-default" role="navigation">
            <div class="navigation">
                <div class="container">

                    <!--Боковая невидимая кнопка меню и логотип с боковыми панелями-->

                        <!--Боковая невидимая кнопка меню-->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--Левая панель-->

                    <div class="mid_range">

                            <div class="col-xs-4">
                                <div class="phone">
                                    Тел.: +7 (86140) 67251
                                    <div class="address">
                                        <a href="/contacts">село Коноково, улица Донская,5.</a>
                                    </div>
                                </div>
                                <div class="callback">
                                    <a href="/contact">Отправить нам E-mail</a>
                                </div>
                            </div>
                            <!--Логотип-->
                            <div class="col-xs-4">
                                <div class="top-logo">
                                    <a rel='nofollow'  class="top-logo-link" href="/">Школа №15 </a>
                                </div>
                            </div>


                            <!--Правая панель-->
                            <div class="col-xs-4">
                                <!--Вход с соц сетей-->
                                <div class="header-social" style="text-align: right">
                                    <script src="//ulogin.ru/js/ulogin.js"></script>
                                    <div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name,email;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri={{'http://'. $_SERVER['HTTP_HOST']}}/ulogin;mobilebuttons=0;"></div>
                                </div>
                            </div>
                    </div>
                            <div class="col-xs-4">
                                <!--Вывод кнопки авторизации-->
                                @if (!(Auth::check()))
                                    <div class="signup">
                                        <a class="btn-flat nyroModal" href="/login" >Войти на сайт</a>
                                    </div>
                                @else
                                    <div style="text-align: right">
                                        <p>{{'Вы вошли как '.Auth::user()->name}}</p>
                                    </div>
                                    <div class="signup">
                                        @if(Auth::user()->IsAdmin)
                                        <a class="btn-flat nyroModal" href="/admin" >Админка</a>
                                        @endif
                                        <a class="btn-flat nyroModal" href="/logout" >Выйти с сайта</a>
                                    </div>
                                @endif
                            </div>

                </div>

                        <!--/Логотип и боковые панели-->

                    <!--/Боковая невидимая кнопка меню и логотип с боковыми панелями-->
                <div class="container">
                    <!--Меню-->
                    <div class="navbar-collapse collapse">
                        <div id="main_menu" class="row menuX">
                            <div class="col-md-12">
                                <ol class="main-menu-list">
                                    <li role="presentation"><a href="/" >Главная</a></li>

                                    <li role="presentation"><a href="/about" >О школе</a>
                                        <ul role="tablist">
                                    <li role="presentation"><a href="/about">О школе</a></li>
                                    <li role="presentation"><a href="/teachers">Наши педагоги</a></li>
                                    <li role="presentation"><a href="/dopolnitelnie-zaniatia">Дополнительные занятия</a></li>
                                    <li role="presentation"><a href="/stadion">Стадион</a></li>
                                    <li role="presentation"><a href="/krujki">Кружки</a></li>
                                    <li role="presentation"><a href="http://school.wunderpark.ru/gamepark">Детская площадка</a></li>
                                    <li role="presentation"><a href="http://school.wunderpark.ru/lab">Тепличный комплекс</a></li>
                                        </ul></li>

                                    <li role="presentation"><a href="/news" >Блог</a><!--<ul>
                                    <li><a href="/news/1" >События</a></li>
                                    <li><a href="/gallery">Фотогалерея</a></li></ul>--></li>

                                    <li role="presentation"><a href="/documentsAll">Документация</a>
                                        <ul role="tablist">

                                    @if (Auth::check()and (Auth::user()->IsAdmin==1))
                                    <li role="presentation"><a href="/documentCreateOpen">Добавить пункт</a></li>
                                    @endif

                                    <?php $documents = \App\document::all();?> <!-- Получение списка документов для охображения их заголовков в меню-->
                                    @foreach($documents as $document)
                                    <li role="presentation"><a href="/documentView/{{$document->id}}">{{$document->title}}</a></li>
                                    @endforeach
                                        </ul></li>

                                    <li role="presentation"><a href="/contacts" >Контакты</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>