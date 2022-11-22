<!doctype html>
<html class="no-js" lang="en">
    <head>
        <base href="{{url('/')}}"/>
        <title>{{ $title }} | {{$set->site_name}}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{ $logo->image_link }}" />
        <link rel="apple-touch-icon" href="{{url('/')}}/asset/{{ $logo->image_link }}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/asset/{{ $logo->image_link }}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/asset/{{ $logo->image_link }}" />
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/bootstrap/css/global.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/swiper/css/swiper.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/wow/css/animate.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/magnific-popup/css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/components-elegant-icons/css/elegant-icons.min.css">
        <!-- Site Stylesheet -->
        <link rel="stylesheet" href="{{url('/')}}/asset/css/color-1.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/global_assets/css/icons/fontawesome/styles.min.css" />
        <link rel="stylesheet" href="{{url('/')}}/asset/css/app.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
         @yield('css')
    </head>
<!-- header begin-->
<body data-style="default">
    <header class="navbar-header navbar-trans-fixed">
        <div class="container">
            <div class="header-inner">
                <div class="toggle-menu">
                    <span class="bar bg-dark"></span>
                    <span class="bar bg-dark"></span>
                    <span class="bar bg-dark"></span>
                </div>
                <!-- /.toggle-menu -->


                <div class="navbar-mobile-logo">
                    <a href="{{route('home')}}" class="logo">
                       <img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="main-logo"> 
                    </a>
                </div>

                <nav class="navbar-nav nav-dark">
                    <div class="close-menu">
                        <i class="ei ei-icon_close"></i>
                    </div>

                    <div class="navbar-logo">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="main-logo"> 
                        </a>
                    </div>
                    <!-- /.navbar-logo -->

                    <div class="menu-wrapper" data-top="992">
                        <ul class="navbar-main-menu">
                           <li class="menu-item-has-children">
                                <a href="javascript:void;">Learn</a>
                                <ul class="sub-menu">
                                    @foreach($cat as $vcat)
                                    <li><a href="{{url('/')}}/cat/{{$vcat->id}}/1">{{$vcat->categories}}</a></li>
                                    @endforeach
                                </ul>
                            </li>                            
                            <li class="menu-item-has-children">
                                <a href="javascript:void;">Services</a>
                                <ul class="sub-menu">
                                    @foreach($pages as $vpages)
                                        @if(!empty($vpages))
                                        <li><a href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>    
                            <li class="menu-item-has-children">
                                <a href="javascript:void;">Support</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('faq')}}">FAQs</a></li>
                                    <li><a href="{{route('blog')}}">Supporting articles</a></li>
                                    <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                    <li><a href="{{route('privacy')}}">Privacy policy</a></li>
                                    <li><a href="{{route('contact')}}">Contact us</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="{{route('about')}}" >Why {{$set->site_name}}</a></li>
                            <li><a href="{{route('login')}}" >Login</a></li>
                        </ul>

                        <div class="nav-right">
                            <a href="{{route('register')}}" class="nav-btn">Create free account</a>
                        </div>
                    </div>
                    <!-- /.menu-wrapper -->
                </nav>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.header-inner -->
        </div>
        <!-- /.container -->
    </header>
<!-- header end -->

@yield('content')


<!-- footer begin -->
<footer id="footer" class="wow soneFadeUp">
    <div class="container">
        <div class="footer-nner">
            <div class="row">

                <div class="col-lg-8 col-md-6">
                    <div class="widget footer-widget style_logo">
                        <!--<img src="{{url('/')}}/asset/{{ $logo->image_link }}" alt="Logo">-->
                        <p>{{$set->site_desc}}</p>
                        <ul class="footer-menu">
                        <li>Office: {{$set->address}}</li>
                        <li>{{$set->mobile}} - {{$set->email}}</li>
                        </ul>

                    </div>
                    <!-- /.widget footer-widget -->
                </div>
                <!-- /.col-lg-3 col-md-6 -->


                <div class="col-lg-2 col-md-6">
                    <div class="widget footer-widget">
                        <h5 class="widget-title">Quick links</h5>

                        <ul class="footer-menu">
                        <li><a class="text-small" href="{{route('contact')}}" >Contact</a></li>
                        @foreach($pages as $vpages)
                            @if(!empty($vpages))
                        <li><a class="text-small text-extra-light-gray"href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a></li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <!-- /.widget footer-widget -->
                </div>
                <!-- /.col-lg-3 col-md-6 -->

                <div class="col-lg-2 col-md-6">
                    <div class="widget footer-widget">
                        <h5 class="widget-title">COMPANY</h5>

                        <ul class="footer-menu">
                        <li><a class="text-small" href="{{route('about')}}" >About</a></li>
                        <li><a class="text-small" href="{{route('terms')}}" >Terms of Use</a></li>
                        <li><a class="text-small" href="{{route('privacy')}}" >Privacy Policy</a></li>
                        @if(count($faq)>0)
                        <li><a class="text-small" href="{{route('faq')}}">FAQs</a></li>
                        @endif
                        </ul>
                    </div>
                    <!-- /.widget footer-widget -->
                </div>
                <!-- /.col-lg-3 col-md-6 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.footer-nner -->

        <div class="site-info">
            <div class="copyright">
                <p class="text-white">{{$set->site_name}}  &copy; {{date('Y')}}. All Rights Reserved. </p>
            </div>
        </div>
        <!-- /.site-info -->
    </div>
    <!-- /.container -->
</footer>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/{{$set->tawk_id }}/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
        <!-- end footer -->
        <a href="#header" data-type="section-switch" class="return-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>


    <!-- Dependency Scripts -->
    <script src="{{url('/')}}/asset/vendor/popper.js/popper.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/swiper/js/swiper.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/jquery.appear/jquery.appear.js"></script>
    <script src="{{url('/')}}/asset/vendor/wow/js/wow.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/countUp.js/countUp.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
    <script src="{{url('/')}}/asset/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('/')}}/asset/vendor/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>

    <!-- Site Scripts -->
    <script src="{{url('/')}}/asset/js/header.js"></script>
    <script src="{{url('/')}}/asset/js/app.js"></script>
    <script src="{{url('/')}}/asset/js/sweetalert.js"></script>
    @include('sweetalert::alert')
@yield('script')
@if (session('success'))
    <script>
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
<script>
            @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>


</body>

</html>