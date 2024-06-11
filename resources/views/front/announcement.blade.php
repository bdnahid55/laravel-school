<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="icon" href="img/favicon.png" type="image/x-icon" /> --}}
    <title>{{ $preview_announcement->title }}</title>
    <link rel='stylesheet' href='/front/css/bootstrap.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/front/css/font-awesome.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/front/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/front/css/menu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/front/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/front/css/stylesheet.css' type='text/css' media='all' />
    <script type='text/javascript' src='/front/js/jquery.js'></script>
    <script type='text/javascript' src='/front/js/jquery-migrate.js'></script>
    <script type='text/javascript' src='/front/js/bootstrap.js'></script>
</head>

<body>
    <!----------__________header start___________------------>
    <section class="section_1">
        <div class="container  card main_website">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 logo">
                    <a href=""><img src="{{ url('uploads/logo', $Logo->image) }}" alt="{{ $Logo->name }}"
                            width="100%"></a>
                </div>
            </div>
            <!----------__________menu start___________------------>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="" id="nav">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="menu-main-menu-container">
                                    <ul id="menu-main-menu" class="nav navbar-nav">
                                        <li><a href="{{ env('APP_URL') }}/">Home</a></li>
                                        @foreach ($Menus as $menu)
                                            <li class="nav-item">
                                                <a @if ($menu->children) data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" @endif
                                                    href="{{ $menu->url }}">{{ $menu->name }}@if ($menu->children)
                                                        <span class="caret"></span>
                                                    @endif
                                                </a>
                                                <ul class="@if ($menu->children) dropdown-menu @endif">
                                                    @foreach ($menu->children as $submenu)
                                                        <li><a href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!------------__________ Single Page start ___________------------->
            <div class="row">
                <div class="single_page">
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="page_dtails">
                            <h4 class="page_hadding">{{ $preview_announcement->title }}</h4>
                            <p>{!! $preview_announcement->description !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                </div>
            </div>
            <!--------__________ Single Page close ___________---------->
        </div>
    </section>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
    </button>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    <section class="section_2">
        <div class="container">
            <div class="root">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-12 root_01">{{ $Footer->title }}</div>

                    <div class="col-lg-6 col-md-6 col-sm-12 root_02">
                        Design & Developed BY <a href="http://codefusions.com/"
                            title='Mobile : 01536-197597'>Codefusions.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
