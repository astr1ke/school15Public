
   <!-- header -->
    <div id="header" >
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="phone">Тел.: +7 (86140) 67251
                        <div class="address"><a href="/contacts">село Коноково, улица Донская,5.</a></div>
                    </div>
                    <div class="callback">
                        <a class="nyroModal" href="/ajax/modal/callback" onclick="yaCounter30740753.reachGoal('zakaz_zvonka'); return true;">Отправить нам E-mail</a>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="top-logo">
                        <a rel='nofollow'  class="top-logo-link" href="/">Школа №15 </a>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="header-social"style="text-align: right">
                        <script src="//ulogin.ru/js/ulogin.js"></script>
                        <div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name,email;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri={{'http://'. $_SERVER['HTTP_HOST']}}/ulogin;mobilebuttons=0;"></div>
                    </div>
                    @if (!(Auth::check()))
                        <div style="text-align: right">
                            <p>{{'Вход на сайт с помощью соц сетей'}}</p>
                        </div>
                        <div class="signup">
                            <a class="btn-flat nyroModal" href="/login" >Войти на сайт</a>
                        </div>
                    @else
                        <div style="text-align: right">
                            <p>{{'Вы вошли как '.Auth::user()->name}}</p>
                        </div>
                        <div class="signup">
                            <a class="btn-flat nyroModal" href="/logout" >Выйти с сайта</a>
                        </div>
                    @endif

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

                        <li><a href="/news/1" >Жизнь школы</a><!--<ul>
                        <li><a href="/news/1" >События</a></li>
                        <li><a href="/gallery">Фотогалерея</a></li>--></ul></li>

                        <li><span>Наши возможности</span><ul>
                        <li><a href="/dopolnitelnie-zaniatia">Дополнительные занятия</a></li>
                        <li><a href="/stadion">Стадион</a></li>
                        <li><a href="/krujki">Кружки</a></li>
                        <li><a href="http://school.wunderpark.ru/gamepark">Детская площадка</a></li>
                        <li><a href="http://school.wunderpark.ru/lab">Тепличный комплекс</a></li></ul></li>

                        <li><a href="/documentsAll">Документация</a><ul>

                        @if (Auth::check()and (Auth::user()->IsAdmin==1))
                        <li><a href="/documentCreateOpen">Добавить пункт</a></li>
                        @endif

                        <?php $documents = \App\document::all();?> <!-- Получение списка документов для охображения их заголовков в меню-->
                        @foreach($documents as $document)
                        <li><a href="/documentView/{{$document->id}}">{{$document->title}}</a></li>
                        @endforeach
                        </ul></li>

                        <li><a href="/contacts" >Контакты</a></li>			</ol>
                </div>
            </div>
        </div>
    </div>