<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="icon" href="img/favicon.png" type="image/x-icon" /> --}}
    <title>Home</title>
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
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
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
            <!----------__________slider start___________------------>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="slider">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($Slider as $slideritem)
                                    <div class="item @if ($loop->first) active @endif">
                                        <!-- Post Image Code Start-->
                                        <a href="#">
                                            <img width="1000" height="300"
                                                src="{{ url('uploads/slider', $slideritem->image) }}"
                                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                alt="{{ $slideritem->title }}" /> </a>
                                        <!-- Post Image Code Close-->
                                        <h4 class="centered"><a href="">{{ $slideritem->title }}</a>
                                        </h4>
                                    </div>
                                @endforeach

                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!----------__________ scrool start ___________------------>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 scrool">
                    <div class="col-lg-2 col-md-2 col-sm-2 scrool_1">
                        ঘোষনা </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 scrool_2">
                        <marquee direction="left" scrollamount="4px" onmouseover="this.stop()"
                            onmouseout="this.start()">
                            @foreach ($Announcement as $announcementitem)
                                <i class="fa fa-stop-circle"></i> <a
                                    href="{{ route('announcement', $announcementitem->id) }}">{{ $announcementitem->title }}</a>
                            @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
            <!-----------------scrool close ------------------>

            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 ">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="catagory_title">{{ $SchoolHistory->title }}</h4>
                            <div class="History">
                                <img width="741" height="320"
                                    src="{{ url('uploads/schoolhistory', $SchoolHistory->image) }}"
                                    alt="{{ $SchoolHistory->title }}" />
                                <p>{{ $SchoolHistory->description }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4 class="catagory_title">{{ $SpeechOne->title }}</h4>
                            <div class="profile">
                                <img width="400" height="500"
                                    src="{{ url('uploads/speechone', $SpeechOne->image) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                    alt="{{ $SpeechOne->title }}" />
                                <p>{{ $SpeechOne->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4 class="catagory_title">{{ $SpeechTwo->title }}</h4>
                            <div class="profile">
                                <img width="400" height="500"
                                    src="{{ url('uploads/speechtwo', $SpeechTwo->image) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                    alt="{{ $SpeechTwo->title }}" />
                                <p>{{ $SpeechTwo->description }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!----------__________ homemenu one start ___________------------>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="catagory_title_1">শিক্ষকদের তথ্য</h4>
                                    <div class="news_information">
                                        <img src="{{ url('/front/img/menu01.jpg') }}">
                                        <div class="menu-student-information-container">
                                            <ul id="menu-student-information" class="menu">
                                                @foreach ($Page as $pageitem)
                                                    @if ($pageitem->display_section == 1)
                                                        <li><a
                                                                href="{{ route('page', $pageitem->id) }}">{{ $pageitem->title }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!----------__________ homemenu two start ___________------------>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="catagory_title_2">ছাত্রছাত্রীদের তথ্য</h4>
                                    <div class="news_information">
                                        <img src="{{ url('/front/img/menu02.jpg') }}">
                                        <div class="menu-teachers-information-container">
                                            <ul id="menu-teachers-information" class="menu">
                                                @foreach ($Page as $pageitem)
                                                    @if ($pageitem->display_section == 2)
                                                        <li><a
                                                                href="{{ route('page', $pageitem->id) }}">{{ $pageitem->title }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------__________ home menu Three start ___________------------>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="catagory_title_3">একাডেমীক তথ্য </h4>
                                    <div class="news_information">
                                        <img src="{{ url('/front/img/menu04.jpg') }}">
                                        <ul>
                                            @foreach ($Page as $pageitem)
                                                @if ($pageitem->display_section == 3)
                                                    <li><a
                                                            href="{{ route('page', $pageitem->id) }}">{{ $pageitem->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!----------__________ homemenu four start ___________------------>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="catagory_title_4"> ডাউনলোড </h4>
                                    <div class="news_information">
                                        <img src="{{ url('/front/img/menu03.jpg') }}">
                                        <div class="menu-academic-information-container">
                                            <ul id="menu-academic-information" class="menu">
                                                @foreach ($Download as $downloaditem)
                                                    <li><a
                                                            href="{{ route('download', $downloaditem->id) }}">{{ $downloaditem->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- This is sidebar section -->
                <div class="col-lg-3 col-md-3 col-sm-3">

                    <!----------__________ Notice start ___________------------>
                    <h4 class="catagory_title_5"> নোটিশ বোর্ড</h4>
                    <div class="notice_box">
                        <marquee direction="up" scrollamount="3px" onmouseover="this.stop()"
                            onmouseout="this.start()">
                            <ul>
                                @foreach ($Notice as $noticeitem)
                                    <li><a href="{{ route('notice', $noticeitem->id) }}">{{ $noticeitem->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </marquee>
                    </div>
                    <!----------__________ facebook start ___________------------>
                    {{-- <div class="facebook_title"><a href="#">ফেইজবুক পেজ</a></div> --}}
                    <!----------__________ facebook close ___________------------>

                    <!----------__________ Sidemenu Three start ___________------------>
                    <h4 class="catagory_title_5"> গুরুত্বপূর্ণ তথ্য</h4>
                    <div class="notice_box">
                        <div class="menu-important-link-container">
                            <ul id="menu-important-link" class="menu">
                                @foreach ($ImportantLink as $importantlinkitem)
                                    <li><a href="{{ $importantlinkitem->url }}">{{ $importantlinkitem->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up"
            aria-hidden="true"></i>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

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
