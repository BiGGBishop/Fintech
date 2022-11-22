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
                    <span class="discount wow soneFadeUp" data-wosw-delay="0.3s">Create an account</span>
                    <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                    Let's get to know you
                    </h1>     
                    <span class="text-medium">Need help? <a href="mailto:{{$set->email}}">contact support</a></span>             

                </div>
                <!-- /.backg-content -->
            </div>
            <!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <div class="wow soneFadeLeft">
                  <div class="pt-100"></div>
                  @if($set->registration==1)
                    <form action="{{route('submitregister')}}" method="post" class="contact-form" data-saasone="contact-froms">
                        @csrf
                      <input placeholder="Full name" type="text" name="name" required>
                      @if ($errors->has('name'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('name') }}
                        </span>
                      @endif                      
                      <input placeholder="Username" type="text" name="username" required>
                      @if ($errors->has('username'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('username') }}
                        </span>
                      @endif
                      <input inputmode="tel" maxlength="16" minlength="11" type="tel" name="phone" placeholder="Phone Number" required>
                      @if ($errors->has('phone'))
                          <span class="error form-error-msg ">
                              {{ $errors->first('phone') }}
                          </span>
                      @endif
                      <input type="email" name="email" placeholder="Email Address" required>
                      @if ($errors->has('email'))
                          <span class="error form-error-msg ">
                              {{ $errors->first('email') }}
                          </span>
                      @endif
                      <input type="password" name="password" placeholder="Password" required>
                      @if ($errors->has('password'))
                          <span class="error form-error-msg ">
                              {{ $errors->first('password') }}
                          </span>
                      @endif
                      <div class="text-left">
                        <a href="{{route('login')}}"><span class="text-medium">Got an account?</span></a>
                      </div>                              
                      <div class="text-right">
                        <button type="submit" class="sone-btn">Continue</button>
                      </div>
                    </form>
                  @else
                    <div class="text-dark text-center mt-2 mb-3"><strong>We are not currenctly accepting new users</strong></div>
                  @endif
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
