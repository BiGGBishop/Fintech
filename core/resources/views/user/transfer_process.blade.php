
@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">  
            <div class="col-lg-12">
                <div class="card">
                <!-- Card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <!-- Title -->
                                <h5 class="h3 mb-0 text-primary">{{$merchant->name}}</h5>
                            </div>
                            <div class="col-4 text-right">
                                @if($ext->status==0)
                                    <a href="{{url('/')}}/user/cancel_merchant/{{$ext->reference}}" class="btn btn-sm btn-danger">Cancel</a>
                                @endif
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <a href="javascript:void;" class="avatar avatar-xxl">
                                <img alt="Image placeholder" src="{{url('/')}}/asset/profile/{{$merchant->image}}" style="height:auto; max-width:100%;">
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h3 class="h1 mb-0 text-success">{{number_format($ext->amount+($ext->amount*$set->merchant_charge/100)).$currency->name}}</h3>
                                <p class="text-sm text-dark mb-0">Service charge: {{number_format($ext->amount*$set->merchant_charge/100).$currency->name}}</p>
                                <p class="text-sm text-dark mb-0">Transaction reference: #{{$ext->reference}}</p>
                                <p class="text-sm text-dark mb-0">{{$merchant->description}}</p>
                            </div>
                        </div>
                        @if($ext->status==0)
                            <div class="text-right">
                                <a href="{{url('/')}}/user/submit_merchant/{{$ext->reference}}" class="btn btn-neutral">Pay<i class="icon-paperplane ml-2"></i></a>
                            </div>  
                        @endif
                    </div>
                </div>            
            </div>
        </div>
    </div>
@stop