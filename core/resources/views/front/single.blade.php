@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="backg backg-one" style="background-image: linear-gradient(0deg, #{{$set->gradient1}} 0%, #{{$set->gradient2}} 100%);">
    <div class="circle-shape"><img src="{{url('/')}}/asset/img/shape/shape-circle.svg" alt="circle"></div>
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6 z100">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp" data-wosw-delay="0.3s">{{$xcat->categories}}</span>
                        <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                        {{$post->title}}
                        </h1>
                    </div>
                    <!-- /.backg-content -->
                </div>
                <!-- /.col-lg-6 -->

                <div class="col-lg-6">
                    <div class="promo-mockup wow soneFadeLeft">
                    
                    </div>
                    <!-- /.promo-mockup -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.backg-content-wrap -->
    </div>
    <!-- /.container -->
    <div class="bg-shape bg-shape-bottom">
        <svg width="1920" height="500" viewBox="0 0 1920 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 378C500.193 206.37 633.5 54 1122.5 220C1611.5 386 1550.97 90.4445 1920 0V500H0V378Z" fill="white"/>
            <path class="path-back-shape" d="M446.5 273.504C354.5 274 272.5 275.504 272.5 275.504C542.689 161.595 684.5 129.5 883 159C883 159 852.5 169 826 176.504C799.5 184.009 768.913 211.198 740 227.504C701 249.5 675.329 267.561 625.5 273.504C558.972 281.439 538.5 273.009 446.5 273.504Z"/>
        </svg>
    </div>
</section>
<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper">
                    <article class="post post-signle">
                        <div class="feature-image"><a href="javascript:void;"><img src="{{url('/')}}/asset/thumbnails/{{$post->image}}" alt=""></a></div>
                        <div class="blog-content">
                            <p>{!!$post->details!!}</p>                           
                            <div class="single-blog-bottom-content">
                                <div class="blog-share">
                                    <div class="share-title">
                                        <p>Share:</p>
                                    </div>
            @include('partials.share')
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
        <!-- NAV -->
    </div>
</section>
@stop