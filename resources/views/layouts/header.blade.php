
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

                        <li><a href="/news/1" >Жизнь школы</a><!--<ul>
                        <li><a href="/news/1" >События</a></li>
                        <li><a href="/gallery">Фотогалерея</a></li>--></ul></li>

                        <li><span>Наши возможности</span><ul>
                        <li><a href="/dopolnitelnie-zaniatia">Дополнительные занятия</a></li>
                        <li><a href="/stadion">Стадион</a></li>
                        <li><a href="/krujki">Кружки</a></li>
                        <li><a href="http://school.wunderpark.ru/gamepark">Детская площадка</a></li>
                        <li><a href="http://school.wunderpark.ru/lab">Тепличный комплекс</a></li></ul></li>

                        <li><span>Документация</span><ul>
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
                        </ul></li>

                        <li><span>Организационные материалы</span><ul>
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
                        </ul></li>


                        <li><a href="/contacts" >Контакты</a></li>			</ol>
                </div>
            </div>
        </div>
    </div>