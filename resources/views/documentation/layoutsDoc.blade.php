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
            </aside>
        </div>
    </div>
</section>


@include('layouts.footer')
@include('layouts.scripts')


</body>

</html>