@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
      <div class="row">
          <div class="col-lg-12">
            <div class="card bg-white">
              <div class="card-body">
                <div class="">
                  <h3 class="">Track money sent to you</h3>
                  <p class="mt-0 mb-5">Service charge {{$set->merchant_charge}}%</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">    
        @foreach($log as $val)
         <div class="col-md-4">
          <div class="card bg-white">
            <!-- Card body -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                </div>
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="JAVASCRIPT:VOID;" class="text-primary">#{{$val->reference}}</a>
                  </h4>
                  <p class="text-sm text-dark mb-0">Amount: {{number_format($val->amount)}}{{$currency->name}}</p>
                  <p class="text-sm text-dark mb-0">From: {{$val->sender['name']}}</p>
                  <p class="text-sm text-dark mb-0">Created: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                  @if($val->status==1)
                  <span class="badge badge-pill badge-success">Successful</span>
                  @elseif($val->status==0)
                  <span class="badge badge-pill badge-primary">Pending</span>                  
                  @elseif($val->status==2)
                  <span class="badge badge-pill badge-danger">Cancelled</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div> 
        @endforeach
        </div>
@stop