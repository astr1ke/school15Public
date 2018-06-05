@extends('layouts.layouts')
@section('content')

    <!-- Главная картинка -->
    <hr>
        <div id="slider" class="row">
            <ul class="bxslider">
                <div id="amazingcarousel-container-2">
                    <div id="amazingcarousel-2" style="display:none;position:relative;width:100%;max-width:2000px;margin:0px auto 0px;">
                        <div class="amazingcarousel-list-container">
                            <ul class="amazingcarousel-list">
                                <li class="amazingcarousel-item">
                                    <div class="amazingcarousel-item-container">
                                        <div class="amazingcarousel-imageMain"><img src="images/main.jpg"  alt="17677754" /></a></div>
                                    </div>
                                    <a >
                                        <div class="bx-caption">
                                            <div class="bx-title">Дни Открытых Дверей</div>
                                            <div class="bx-text"><div>
                                                    В Международной Школе Wunderpark<br />
                                                    с 6 июня по 5 июля</div>
                                                <div>
                                                    Среда и четверг 10:00 &ndash; 11:30</div>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li class="amazingcarousel-item">
                                    <div class="amazingcarousel-item-container">
                                        <div class="amazingcarousel-imageMain"><img src="images/main2.jpg"  alt="25367100" /></a></div>
                                    </div>
                                        <div class="bx-caption">
                                            <div class="bx-title">Дни Открытых Дверей</div>
                                            <div class="bx-text"><div>
                                                    В Международной Школе Wunderpark<br />
                                                    с 6 июня по 5 июля</div>
                                                <div>
                                                    Среда и четверг 10:00 &ndash; 11:30</div>
                                            </div>
                                        </div>

                                </li>
                                <li class="amazingcarousel-item">
                                    <div class="amazingcarousel-item-container">
                                        <div class="amazingcarousel-imageMain"><img src="images/main3.jpg"  alt="25367100" /></a></div>
                                    </div>
                                    <a >
                                        <div class="bx-caption">
                                            <div class="bx-title">Дни Открытых Дверей</div>
                                            <div class="bx-text"><div>
                                                    В Международной Школе Wunderpark<br />
                                                    с 6 июня по 5 июля</div>
                                                <div>
                                                    Среда и четверг 10:00 &ndash; 11:30</div>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                            </ul>
                            <div class="amazingcarousel-prev"></div>
                            <div class="amazingcarousel-next"></div>
                        </div>
                        <div class="amazingcarousel-nav"></div>
                        <div class="amazingcarousel-engine"></div>
                    </div>
                </div>
            </ul>
        </div>

<!--Последние новости-->
    <div class="lates">
        <div class="container">
            <div class="text-center">
                <h2>Последние новости</h2>
            </div>
            @foreach($articles1 as $article)
                <div class="col-md-4 wow fadeInDown"  data-wow-duration="1000ms" data-wow-delay="300ms">
                <?php
                $txt=$article->text;
                $txt=preg_replace ('/<img.*>/Uis', '', $txt);
                $txt=preg_replace ('/<img[^>]*?src=\"(.*)\"/iU', '', $txt);
                $txt=strip_tags($txt, '<br>');
                $txt=mb_strimwidth($txt,0,100,'...');
                ?> <!---  обрезаем колво символов для превью статей на главной --->
                    <span class="img-border-square" style="height: 280px; width: 360px; margin: 0; padding: 5px">
                        <a href="{{$article->pictures}}" class="html5lightbox" data-group="news">
                            <div style="max-height: 270px; max-width: 350px; height: 100%; width: 100%">
                                <div class="shadow-layer"></div>
                                <img  src="{{$article->pictures}} " class="img-responsive html5lightbox" style="height: 100%; width: 100%;object-fit: cover;object-position: 0 0"/>
                            </div>
                        </a>
                    </span>
                    <a href="/articleNews/{{$article->id}}"><h3>{{$article['articleName']}}</h3>
                    <p style="text-align: center">{!!$txt!!}</p></a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="lates">
        <div class="container">
            @foreach($articles2 as $article)
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <?php
                $txt=$article->text;
                $txt=preg_replace ('/<img.*>/Uis', '', $txt);
                $txt=preg_replace ('/<img[^>]*?src=\"(.*)\"/iU', '', $txt);
                $txt=strip_tags($txt, '<br>');
                $txt=mb_strimwidth($txt,0,100,'...');
                ?> <!---  обрезаем колво символов для превью статей на главной --->
                    <span class="img-border-square" style="height: 280px; width: 360px; margin: 0; padding: 5px">
                        <a href="{{$article->pictures}}" class="html5lightbox" data-group="news">
                            <div style="max-height: 270px; max-width: 350px; height: 100%; width: 100%">
                                <div class="shadow-layer"></div>
                                <img  src="{{$article->pictures}} " class="img-responsive html5lightbox" style="height: 100%; width: 100%;object-fit: cover;object-position: 0 0"/>
                            </div>
                        </a>
                    </span>
                    <a href="/articleNews/{{$article->id}}"><h3>{{$article['articleName']}}</h3>
                        <p style="text-align: center">{!!$txt!!}</p></a>
                </div>
            @endforeach
        </div>
    </div>

<!--О щколе-->

<div class="about">
    <div class="container">
        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>О Школе</h2>
            <img src="images/about.jpg" class="img-responsive" />
            <p>Учебное заведение находится по адресу: Краснодарский край, Успенский район,
                село Коноково, улица Донская,5.
            </p>
        </div>

        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <h2><br/></h2>

            <p>Школа за время своего существования прошла путь от малокомплектной начальной до средней общеобразовательной.</p>
            <p>С 01. 09. 1999 школа стала средним общеобразовательным учреждением в соответствии с постановлением Главы
                Администрации Успенского района Краснодарского края №386 от 21.06.99 «О реорганизации Коноковской основной
                общеобразовательной школы №15 в среднюю общеобразовательную школу».
            <p>В 2008-2009 учебном году на основании постановления Главы Администрации Успенского района школа получила
                статус основной общеобразовательной.  Руководили школой за это время: Бондина Лидия Степановна,
                Бондин Михаил Титович, Пысь Михаил Прохорович, Щербинин Григорий Петрович, Хевсоков Роман Михайлович,
                Петрашов Федор Анатольевич, Фисунова Ирина Юрьевна .
            </p>
            <p>Каждый из них внес свою лепту в развитие школы. В настоящее время директором МБОУООШ №15
                является Сергей Юрьевич Чечин.  </p>
        </div>
    </div>
</div>

<!--Карусель учителя-->
    <div class="container">
        <div class="wp-teachers row">
            <div class="wp-widget section-title-1 uppercase">
                Наш колектив
                <a class="int-link" href="/teachers">ВСЕ ПЕДАГОГИ</a>
                <a class="int-question question nyroModal" href="/contacts">Задать вопрос?</a>
            </div>
        </div>
    </div>
<div id="amazingcarousel-container-1">
    <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:1040px;margin:0px auto 0px;">
        <div class="amazingcarousel-list-container">
            <ul class="amazingcarousel-list">
                <?php
                $teachers = \App\teacher::all();
                ?>
                @foreach($teachers as $teacher)
                <li class="amazingcarousel-item">
                    <div class="col-md-31 col-xs-61" style="text-align: center">
                        <a href="/teachers">
                            <span class="img-border-circle"><img src="{{$teacher->foto}}"/></span>
                            <div class="section-title-2 name">{{$teacher->FIO}}</div>
                            <div class="job-title">{{$teacher->specialization}}</div>
                        </a>
                    </div>
                </li>
                
                @endforeach
                
            </ul>
            <div class="amazingcarousel-prev"></div>
            <div class="amazingcarousel-next"></div>
        </div>
        <div class="amazingcarousel-nav"></div>
        <div class="amazingcarousel-engine"><a href="http://amazingcarousel.com">JavaScript Image Carousel</a></div>
    </div>
</div>

<!--Партнерские ресурсы-->
<hr>
<section id="partner">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Ссылки на другие образовательные ресурсы</h2>
            <p>Если Вас интересует другая информация по образовательной тематике вы можете поискать ее на преставленных ниже серурсах: <br>  </p>
        </div>

        <div class="partners">
            <ul>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
            </ul>
        </div>
    </div>
</section>
<hr>


<!--Связь с нами-->
    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">

                        <div class="media-body">
                            <h2 style="text-align: left"><i class="fa fa-phone"></i>  Есть к вопросы в нам?</h2>

                            <p>Можете отправить нам сообщение через форму отправки сообщений на странице контакты или позвонить по телефону +7 (86140) 55555. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>
    <!--/#conatcat-info-->

    <div align="center">
        <div class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A213c3ca79a0a251293f7decf5ba7cb83982cae0433c17b0ec5498e1f326a1ed9&amp;width=1150&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>



@stop

