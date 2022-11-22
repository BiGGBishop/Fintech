@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
        <div class="row">  
        @foreach($branch as $val)   
         <div class="col-md-4">
          <div class="card bg-white">
            <!-- Card body -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                </div>
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="JAVASCRIPT:VOID;" class="text-primary">{{$val->name}}</a>
                  </h4>
                  <p class="text-sm text-dark mb-0">Country: {{$val->country}}</p>
                  <p class="text-sm text-dark mb-0">State: {{$val->state}}</p>
                  <p class="text-sm text-dark mb-0">Mobile: {{$val->mobile}}</p>
                  <p class="text-sm text-dark mb-0">Zip code: {{$val->zip_code}}</p>
                  <p class="text-sm text-dark mb-0">Postal code: {{$val->postal_code}}</p>
                  <span class="text-success">●</span>
                  <small class="text-success">{{$val->address}}</small>
                </div>
              </div>
            </div>
          </div>
        </div> 
        @endforeach
        </div>
@stop