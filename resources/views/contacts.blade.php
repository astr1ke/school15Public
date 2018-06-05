@extends('layouts.layouts')
@section('content')
    <hr>
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li>Контакты</li>
            </div>
        </div>
    </div>

    <br/>
    <div class="map" >
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A213c3ca79a0a251293f7decf5ba7cb83982cae0433c17b0ec5498e1f326a1ed9&amp;width=100%25&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>



    <section id="contact-page" style="margin-top: 40px">
        <div class="container">
            <div class="center">
                <h2>Задать вопрос</h2>
            </div>
            <div class="row contact-wrap">
                <div class="status alert alert-success" style="display: none"></div>
                <div class="col-md-6 col-md-offset-3">
                    <div id="sendmessage">Ваше сообщение отправлено. Спасибо!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Отправить сообщение</button></div>
                    </form>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#contact-page-->
@endsection