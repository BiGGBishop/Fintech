
@extends('userlayout')

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-white">
          <div class="card-body">
            <div class="">
              <h3 class="">Start receiving payment from any website</h3>
              <a href="{{route('user.add-merchant')}}" class="btn btn-sm btn-neutral">Create merchant</a>
              <a href="{{url('/')}}/user/merchant-documentation" class="btn btn-sm btn-neutral">Documentation</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">  
      @foreach($merchant as $k=>$val)
        <div class="col-md-6">
            <div class="card">
              <!-- Card body -->
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-8">
                    <!-- Title -->
                    <h5 class="h3 mb-0 text-primary">{{$val->name}}</h5>
                  </div>
                  @if($val->status==1)
                  <div class="col-4 text-right">
                    <a href="{{url('/')}}/user/edit-merchant/{{$val->id}}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{url('/')}}/user/log-merchant/{{$val->merchant_key}}" class="btn btn-sm btn-neutral">Logs</a>
                  </div>
                  @endif
                </div>
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    <a href="javascript:void;" class="avatar avatar-xl">
                      <img alt="Image placeholder" src="{{url('/')}}/asset/profile/{{$val->image}}">
                    </a>
                  </div>
                  <div class="col ml--2">
                    <p class="text-sm text-dark mb-0">Website url: {{$val->site_url}}</p>
                    <p class="text-sm text-dark mb-0">Merchant key: {{$val->merchant_key}}</p>
                    <p class="text-sm text-dark mb-0">Created: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                    <p class="text-sm text-dark mb-0">Updated: {{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</p>
                    <p class="text-sm text-dark mb-0">Description: {{$val->description}}</p>
                    @if($val->status==1)
                      <span class="badge badge-success">Approved</span>
                    @elseif($val->status==0)
                      <span class="badge badge-danger">Pending</span>                    
                    @elseif($val->status==2)
                      <span class="badge badge-primary">Declined</span>
                    @endif

                  </div>
                </div>
              </div>
            </div>
        </div>
      @endforeach
    </div>
@stop