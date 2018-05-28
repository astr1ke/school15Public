<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Коноковская Школа №15</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico">
    @include('layouts.stiles')
</head>

<body>
@include('layouts.header')
<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            @yield('breadcrumbContent')
        </div>
    </div>
</div>

<section id="blog" class="container">
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
            @yield('content');
            </div>
            <aside class="col-md-4">
                <!--Вывод -списка документов-->
                <div class="widget categories" style="float: right">
                    <h3>Документация</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category" style="max-width: 250px; width: max-content">
                                <li><a href="/mainInformation">1.Основная Информация</a></li>
                                <li><a href="/structureOrgansAuthority">2.Структуры огранов власти</a></li>
                                <li><a href="/mainInformation">3.Документы</a></li>
                                <li><a href="/mainInformation">4.Образование</a></li>
                                <li><a href="/mainInformation">5.Образовательные стандарты</a></li>
                                <li><a href="/mainInformation">6.Руководство. Педагогический состав</a></li>
                                <li><a href="/mainInformation">7.Материально-техническое обеспечение иосначенность образовательного процесса</a></li>
                                <li><a href="/mainInformation">8.Стипендии и иные виды материальной поддержки</a></li>
                                <li><a href="/mainInformation">9.Платные образовательные услуги</a></li>
                                <li><a href="/mainInformation">10.Финансово-хозяйственная деятельность</a></li>
                                <li><a href="/mainInformation">11.Вакантные места для приема(перевода)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="widget categories" style="float: right">
                    <h3>Организационные материалы()</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category" style="max-width: 250px; width: max-content">
                                <li><a href="/mainInformation">Аттестация педагогических кадров</a></li>
                                <li><a href="/structureOrgansAuthority">ГИА</a></li>
                                <li><a href="/mainInformation">ОРКСЭ</a></li>
                                <li><a href="/mainInformation">Кубановедение</a></li>
                                <li><a href="/mainInformation">Предметные недели</a></li>
                                <li><a href="/mainInformation">Профориентация учащихся</a></li>
                                <li><a href="/mainInformation">Прием в первый класс</a></li>
                                <li><a href="/mainInformation">Воспитательная работа</a></li>
                                <li><a href="/mainInformation">Планирование воспитательной работы </a></li>
                                <li><a href="/mainInformation">Штаб воспитательной работы</a></li>
                                <li><a href="/mainInformation">Совет профилактики</a></li>
                                <li><a href="/mainInformation">Школьное ученическое управление</a></li>
                                <li><a href="/mainInformation">Ура! У нас каникулы</a></li>
                                <li><a href="/mainInformation">Здоровый образ жизни</a></li>
                                <li><a href="/mainInformation">Страница для родителей</a></li>
                                <li><a href="/mainInformation">Месячник оборонно-массовой военно-патриотической работы родная Кубань</a></li>
                                <li><a href="/mainInformation">Безопасность</a></li>
                                <li><a href="/mainInformation">"Готов к труду и обороне"</a></li>
                                <li><a href="/mainInformation">ЮИД</a></li>
                                <li><a href="/mainInformation">Поисково-просветительная работа</a></li>
                                <li><a href="/mainInformation">Школьная газета "Зеркало"</a></li>
                                <li><a href="/mainInformation">Фотоальбомы</a></li>
                                <li><a href="/mainInformation">Наш профсоюз</a></li>
                                <li><a href="/mainInformation">Методическая копилка</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>


@include('layouts.footer')
@include('layouts.scripts')


</body>

</html>