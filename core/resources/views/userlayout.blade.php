<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <base href="{{url('/')}}"/>
        <title>{{ $title }} | {{$set->site_name}}</title>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{ $logo->image_link }}" />
        <link rel="apple-touch-icon" href="{{url('/')}}/asset/{{ $logo->image_link }}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/asset/{{ $logo->image_link2 }}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/asset/{{ $logo->image_link2 }}" />
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/quill/dist/quill.core.css">
        <style type="text/css">
          .preloader {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 9999;
          background-image: url('{{url('/')}}/asset/{{ $logo->image_link }}');
          background-repeat: no-repeat; 
          background-color: #FFF;
          background-position: center;
          }
        </style>
         @yield('css')
    </head>
<!-- header begin-->
<body>
  <div class="preloader"></div>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{url('/')}}/asset/{{ $logo->image_link }}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.dashboard')}}">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text text-dark">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-archive-2 text-primary"></i>
                <span class="nav-link-text text-dark">Transfer money</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{route('user.ownbank')}}" class="nav-link">{{$set->site_name}} account</a>
                  </li> 
                 <li class="nav-item">
                    <a href="{{route('user.otherbank')}}" class="nav-link">Other bank</a>
                  </li>
                </ul>
              </div>
            </li>
            @if($set->asset==1)
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <!--For modern browsers-->
                <i class="ni ni-world-2 text-primary"></i>
                <span class="nav-link-text text-dark">Manage assets</span>
              </a>
              <div class="collapse" id="navbar-examples2">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item text-default">
                    <a href="{{route('user.buyasset')}}" class="nav-link">Buy asset</a>
                  </li> 
                  <li class="nav-item text-default">
                    <a href="{{route('user.sellasset')}}" class="nav-link">Sell asset</a>
                  </li>                 
                  <li class="nav-item text-default">
                    <a href="{{route('user.exchangeasset')}}" class="nav-link">Exchange asset</a>
                  </li>
                  <li class="nav-item text-default">
                    <a href="{{route('user.transferasset')}}" class="nav-link">Transfer asset</a>
                  </li>                  
                </ul>
              </div>
            </li>  
            @endif          
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.fund')}}">
                <i class="ni ni-credit-card text-primary"></i>
                <span class="nav-link-text text-dark">Fund account</span>
              </a>
            </li> 
           <li class="nav-item">
              <a class="nav-link" href="{{route('user.withdraw')}}">
                <i class="ni ni-bag-17 text-primary"></i>
                <span class="nav-link-text text-dark">Withdrawal</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{route('user.statement')}}">
                <i class="ni ni-collection text-primary"></i>
                <span class="nav-link-text text-dark">Account statement</span>
              </a>
            </li> 
            @if($set->py_scheme==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.plans')}}">
                <i class="ni ni-chart-bar-32 text-primary"></i>
                <span class="nav-link-text text-dark">Investment</span>
              </a>
            </li>
            @endif
            @if($set->save==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.save')}}">
                <i class="ni ni-spaceship text-primary"></i>
                <span class="nav-link-text text-dark">Savings</span>
              </a>
            </li>
            @endif
            @if($set->loan==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.loan')}}">
                <i class="ni ni-atom text-primary"></i>
                <span class="nav-link-text text-dark">Loan</span>
              </a>
            </li> 
            @endif 
            @if($set->merchant==1)
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <!--For modern browsers-->
                <i class="ni ni-cart text-primary"></i>
                <span class="nav-link-text text-dark">Merchant</span>
              </a>
              <div class="collapse" id="navbar-examples3">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item text-default">
                    <a href="{{route('user.senderlog')}}" class="nav-link">Sender Logs</a>
                  </li>                 
                  <li class="nav-item text-default">
                    <a href="{{route('user.merchant')}}" class="nav-link">Api keys</a>
                  </li>
                  <li class="nav-item text-default">
                    <a href="{{route('user.merchant-documentation')}}" class="nav-link">Documentation</a>
                  </li>                  
                </ul>
              </div>
            </li>
            @endif  
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.branch')}}">
                <i class="ni ni-building text-primary"></i>
                <span class="nav-link-text text-dark">Branches</span>
              </a>
            </li>   
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.ticket')}}">
                <i class="ni ni-support-16 text-primary"></i>
                <span class="nav-link-text text-dark">Support ticket</span>
              </a>
            </li>        
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.profile')}}">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text text-dark">Account</span>
              </a>
            </li>             
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.password')}}">
                <i class="ni ni-key-25 text-primary"></i>
                <span class="nav-link-text text-dark">Security</span>
              </a>
            </li>  
          </ul>
        </div>
      </div>
    </div>
  </nav>
   <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
            
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <div class="">
            <h6 class="h2 mb-0 text-success">
                {{$currency->symbol.number_format($user->balance)}}
            </h6>
          </div>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="javascript:void;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{url('/')}}/asset/profile/{{$cast}}">
                  </span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{route('user.profile')}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="{{route('user.password')}}" class="dropdown-item">
                  <i class="ni ni-key-25"></i>
                  <span>Password</span>
                </a> 
                <a href="{{route('user.pin')}}" class="dropdown-item">
                  <i class="ni ni-lock-circle-open"></i>
                  <span>Transfer pin</span>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{route('user.logout')}}" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-button-power text-danger"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
<!-- header end -->

@yield('content')


<!-- footer begin -->
<footer class="footer pt-0">

      </footer>
    </div>
  </div>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{url('/')}}/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{url('/')}}/asset/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/select2/dist/js/select2.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/nouislider/distribute/nouislider.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/quill/dist/quill.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/dropzone/dist/min/dropzone.min.js"></script>
  <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- Argon JS -->
  <script src="{{url('/')}}/asset/dashboard/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{url('/')}}/asset/dashboard/js/demo.min.js"></script>
  <script src="{{url('/')}}/asset/js/sweetalert.js"></script>
</body>

</html>
@include('sweetalert::alert')
@yield('script')
@if (session('success'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
    <script>
    @if(Session::has('message'))
    "use strict";
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
@php
$ratex=$currency->rate;
@endphp
<script type="text/javascript">
  $('.preloader').fadeOut(1000);
</script>
<script type="text/javascript">
"use strict";
function sellVals(){
  var amount1 = $("#amount1").val();
  var asset_price1 = $("#asset_price1").find(":selected").text();
  var myarr1 = asset_price1.split("-");
  var dar1 = myarr1[1].split("<");
  var rate1 = parseFloat(dar1)*parseFloat(amount1/@php echo $ratex; @endphp);
  $("#gain1").val(rate1);
}
  $("#amount1").change(sellVals);
  sellVals();
  $("#asset_price1").change(sellVals);
  sellVals();
</script> 
<script type="text/javascript">
"use strict";
function displayVals(){
  var amount = $("#amount").val();
  var asset_price = $("#asset_price").find(":selected").text();
  var myarr = asset_price.split("-");
  var dar = myarr[1].split("<");
  var rate = parseFloat(amount*@php echo $ratex; @endphp)/parseFloat(dar);
  $("#gain").val(rate);
}
  $("#amount").change(displayVals);
  displayVals();
  $("#asset_price").change(displayVals);
  displayVals();
</script>
