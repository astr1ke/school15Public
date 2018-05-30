@extends('layouts.layouts')
@section('content')

    <!-- Главная картинка -->
        <div id="slider" class="row">
            <ul class="bxslider">
                <div id="amazingcarousel-container-2">
                    <div id="amazingcarousel-2" style="display:none;position:relative;width:100%;max-width:2000px;margin:0px auto 0px;">
                        <div class="amazingcarousel-list-container">
                            <ul class="amazingcarousel-list">
                                <li class="amazingcarousel-item">
                                    <div class="amazingcarousel-item-container">
                                        <div class="amazingcarousel-imageMain"><a href="images/main.jpg" title="17677754"  class="html5lightbox" data-group="amazingcarousel-1"><img src="images/main.jpg"  alt="17677754" /></a></div>
                                        <div class="amazingcarousel-titleMain">17677754</div>                    </div>
                                </li>
                                <li class="amazingcarousel-item">
                                    <div class="amazingcarousel-item-container">
                                        <div class="amazingcarousel-imageMain"><a href="images/main2.jpg" title="25367100"  class="html5lightbox" data-group="amazingcarousel-1"><img src="images/main2.jpg"  alt="25367100" /></a></div>
                                        <div class="amazingcarousel-titleMain">25367100</div>                    </div>
                                </li>
                                <li class="amazingcarousel-item">
                                    <div class="amazingcarousel-item-container">
                                        <div class="amazingcarousel-imageMain"><a href="images/main3.jpg" title="25367100"  class="html5lightbox" data-group="amazingcarousel-1"><img src="images/main3.jpg"  alt="25367100" /></a></div>
                                        <div class="amazingcarousel-titleMain">25367100</div>                    </div>
                                </li>
                            </ul>
                            <div class="amazingcarousel-prev"></div>
                            <div class="amazingcarousel-next"></div>
                        </div>
                        <div class="amazingcarousel-nav"></div>
                        <div class="amazingcarousel-engine"><a href="http://amazingcarousel.com">JavaScript Scroller</a></div>
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
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <?php
                $txt=$article->text;
                $txt=preg_replace ('/<img.*>/Uis', '', $txt);
                $txt=preg_replace ('/<img[^>]*?src=\"(.*)\"/iU', '', $txt);
                $txt=strip_tags($txt, '<br>');
                $txt=mb_strimwidth($txt,0,100,'...');
                ?> <!---  обрезаем колво символов для превью статей на главной --->
                    <div style="height: 270px; width: 350px">
                        <a href="/articleNews/{{$article->id}}">
                        <img  src="{{$article->pictures}}" class="img-responsive" style="height: 100%; width: 100%;object-fit: cover;object-position: 0 0"/>
                        </a>
                    </div>
                        <h3>{{$article['articleName']}}</h3></a>
                    <p>{!!$txt!!}</p>
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
                    <div style="height: 270px; width: 350px">
                        <a href="/articleNews/{{$article->id}}">
                        <img  src="{{$article->pictures}}" class="img-responsive" style="height: 100%; width: 100%; object-fit: cover;object-position: 0 0" />
                        </a>
                    </div>
                        <h3>{{$article['articleName']}}</h3></a>
                    <p>{!!$txt!!}</p>
                </div>
            @endforeach
        </div>
    </div>

<!--О нас-->

<div class="about">
    <div class="container">
        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>О нас</h2>
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


<!--Связь с нами-->
    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>У вас есть к нам вопросы?</h2>
                            <p>Можете отправить нам сообщение через форму отправки сообщений на странице контакты или позвонить по телефону +7 (86140) 55555. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>
    <!--/#conatcat-info-->

    <div class="map" >

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13454.82394930258!2d41.33412416619353!3d44.
        85153861224272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x91834f94af1f3938!2z0KjQutC-0LvQsCAxNQ!
        5e0!3m2!1sru!2sru!4v1527362221131" width="800" height="600" frameborder="0" style="border:0position:relative;
        height: 600px;width: 100%;margin-top: 10px" allowfullscreen></iframe>


    </div>




@stop

