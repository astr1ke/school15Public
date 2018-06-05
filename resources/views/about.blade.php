@extends('layouts.layouts')
@section('content')

    <hr>
<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            <li>О нас</li>
        </div>
    </div>
</div>

    <div class="about">
        <div class="container">
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h2>О нашей школе</h2>
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









<div class="our-team">
    <div class="our-team">
        <div class="container">
            <h3>Наша команда</h3>
            <div class="text-center">
                    <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:1040px;margin:0px auto 0px;">
                            <ul class="amazingcarousel-list">
                                <?php
                                $teachers = \App\teacher::all();
                                ?>
                                @foreach($teachers as $teacher)
                                    <li class="amazingcarousel-item">
                                        <div class="wow fadeInDown"  data-wow-duration="1000ms" data-wow-delay="300ms" style="text-align: center">
                                            <img src="{{$teacher->foto}}" alt="">
                                            <h4>{{$teacher->FIO}}</h4>
                                            <p>{{$teacher->specialization}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="amazingcarousel-prev"></div>
                            <div class="amazingcarousel-next"></div>
                        <div class="amazingcarousel-nav"></div>
                        <div class="amazingcarousel-engine"><a href="http://amazingcarousel.com">JavaScript Image Carousel</a></div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection