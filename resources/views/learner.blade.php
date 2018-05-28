<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Company-HTML Bootstrap theme</title>
    @include('layouts.stiles')

</head>

<body>
@include('layouts.header')
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li>Ученикам</li>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <h3>Company Services</h3>
            <hr>
            <div class="col-md-6">
                <img src="images/4.jpg" class="img-responsive">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                    pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque</p>
            </div>

            <div class="col-md-6">
                <div class="media">
                    <ul>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Web Development</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Responsive Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Bootstrap Themes</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="sub-services">
        <div class="container">
            <div class="col-md-6">
                <div class="media">
                    <ul>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Landing Page</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Training</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Logo Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <img src="images/4.jpg" class="img-responsive">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                    pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque</p>
            </div>
        </div>
    </div>

@include('layouts.footer')
@include('layouts.scripts')


</body>

</html>