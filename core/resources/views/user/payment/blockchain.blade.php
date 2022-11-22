@extends('userlayout')
@section('content')
<div class="header pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links">
              <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card bg-white">
        <div class="card-body">
          <div class="align-item-sm-center flex-sm-nowrap text-center">
            <div class="">
              <h4 class="mb-0 text-primary">
                PLEASE SEND EXACTLY <span class="text-dark"> {{ $bitcoin['amount'] }}</span> BTC
              </h4>              
              <h4 class="mb-0 text-primary">
                TO <span class="text-dark"> {{ $bitcoin['sendto'] }}</span>
              </h4>
              {!! $bitcoin['code'] !!}
              <br><br>
              <h4 class="text-white" >SCAN TO SEND</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection