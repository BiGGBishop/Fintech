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
                    <span class="discount wow soneFadeUp" data-wosw-delay="0.3s">{{$set->title}}</span>
                    <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                    Contact us
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
<section id="contact" class="wow soneFadeUp" data-wow-delay="0.3s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-froms">
                    <form action="{{route('contact-submit')}}" method="post" class="contact-form" data-saasone="contact-froms">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="text" name="mobile" placeholder="Mobile" required>
                            </div>
                        </div>
                        <input type="email" name="email" placeholder="Email" required>
                        <textarea name="message" placeholder="Your Comment" required></textarea> 

                        <button type="submit" class="sone-btn">Send Your Message</button>
                        
                        <div class="form-result alert">
                            <div class="content"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services address-contact" style="padding-top:60px !important;">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="title">Don’t hesitate to contact us for<br>any information.</h2>
        </div>
        
        <div class="row gap-y">

            <div class="col-md-4">
              <div class="services-box-wrapper text-center">
                <div class="my-3 services-box-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h5 class="mb-5 fw-500">Our Location</h5>
                <p>{{$set->address}}</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="services-box-wrapper text-center">
                <div class="my-3 services-box-icon"><i class="fas fa-envelope-open"></i></div>
                <h5 class="mb-5 fw-500 color-2">Email & Phone</h5>
                <p>
                <a href="">{{$set->email}}</a>
                <br>
                <a href="">{{$set->mobile}}</a>
                </p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="services-box-wrapper text-center">
                <div class="my-3 services-box-icon"><i class="fas fa-border-all"></i></div>
                <h5 class="mb-5 fw-500">Get In Touch</h5>
                <p>Also find us social media below</p>
                 <ul class="social-link">
                    @foreach($social as $socials)
                        @if(!empty($socials->value))
                    <li><a href="{{$socials->value}}" ><i class="fab fa-{{$socials->type}}"></i></a></li>
                        @endif
                    @endforeach 
                </ul>
              </div>
            </div>

        </div>
    </div>
</section>
@stop