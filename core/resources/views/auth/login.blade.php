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
                    <span class="discount wow soneFadeUp" data-wosw-delay="0.3s">Welcome back,</span>
                    <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                    Sign in to continue
                    </h1>     
                    <span class="text-medium">Trouble signing in? <a href="mailto:{{$set->email}}">contact support</a></span>             

                </div>
                <!-- /.backg-content -->
            </div>
            <!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <div class="wow soneFadeLeft">
                  <div class="pt-100"></div>
                  <form action="{{route('submitlogin')}}" method="post" class="contact-form" data-saasone="contact-froms">
                      @csrf
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="text-left">
                      <a href="{{route('user.password.request')}}"><span class="text-medium">Forgot password?</span></a>
                    </div>                              
                    <div class="text-right">
                      <button type="submit" class="sone-btn">Sign In</button>
                    </div>
                  </form>
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
</section>
@stop