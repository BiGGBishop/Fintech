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
                    <span class="discount wow soneFadeUp" data-wosw-delay="0.3s">{{ __('Reset Password') }}</span>
                    <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                    Recover your account
                    </h1>     
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> {{ $error }}
                    </div>
                    @endforeach
                    @if (session()->has('message'))
                    <div class="alert alert-{{ session()->get('type') }} alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if (session()->has('status'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <span class="text-medium">Need help? <a href="mailto:{{$set->email}}">contact support</a></span>             

                </div>
                <!-- /.backg-content -->
            </div>
            <!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <div class="wow soneFadeLeft">
                  <div class="pt-100"></div>
                    <form action="{{route('user.password.request')}}" method="post" class="contact-form" data-saasone="contact-froms">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
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