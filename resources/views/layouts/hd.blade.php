<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navigation" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="/"><h1><span>Шко</span>ла №15</h1></a>
                </div>
            </div>

            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="/" @if($_SERVER['REQUEST_URI'] == '/') class="active"@endif>Главная</a></li>
                        <li role="presentation"><a href="/about" @if($_SERVER['REQUEST_URI'] == '/about') class="active"@endif>О нас</a></li>
                        <li role="presentation"><a href="/news/1" @if(substr($_SERVER['REQUEST_URI'],0,6) == '/news/' or
                                                                      substr($_SERVER['REQUEST_URI'],0,6) == '/artic' ) class="active"@endif>Жизнь школы</a></li>
                        <li role="presentation"><a href="/gallery" @if($_SERVER['REQUEST_URI'] == '/gallery') class="active"@endif>Наша Галерея</a></li>
                        <li role="presentation"><a href="/learner" @if($_SERVER['REQUEST_URI'] == '/learner') class="active"@endif>Учителям</a></li>
                        <li role="presentation"><a href="/contacts" @if($_SERVER['REQUEST_URI'] == '/contacts') class="active"@endif>Контакты</a></li>
                        @if (!(Auth::check()))
                            <li role="presentation"><a href="/login">Войти</a></li>
                        @else
                            <li role="presentation"><a href="/logout">Выйти</a></li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
</header>