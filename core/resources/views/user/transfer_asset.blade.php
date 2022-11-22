@extends('userlayout')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{url('/')}}/asset/images/shutterstock_1145329577-scaled.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-1"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-10">
        <h1 class="display-2 text-white">Transfer asset</h1>
        <p class="text-white mt-0 mb-5">Transfer charge is {{$set->transfer_charge}}% per transaction.</p>
        <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-neutral"><i class="fa fa-arrow-right"></i> Create request</a>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-white border-0 mb-0">
                <div class="card-body px-lg-5 py-lg-5">
                  <form action="{{route('submit.transferasset')}}" method="post" id="modal-details">
                    @csrf
                    <div class="form-group row">
                      <label class="col-form-label col-lg-2">Amount:</label>
                      <div class="col-lg-10">
                        <div class="input-group input-group-merge">
                          <input type="number" step="any" name="amount" maxlength="10" class="form-control" required="">
                        </div>
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label class="col-form-label col-lg-2">Account number:</label>
                      <div class="col-lg-10">
                      <input type="number" name="acct_no" class="form-control" required="">
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label class="col-form-label col-lg-2">Currency:</label>
                      <div class="col-lg-10">
                        <select class="form-control select" name="asset" id="asset_price" data-fouc required> 
                          @foreach($asset as $k=>$val)
                            <option value="{{$val->plan->id}}">{{$val->plan->symbol}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>                
                    <div class="text-right">
                        <a href="#" data-toggle="modal" data-target="#modal-form" class="btn btn-primary">Send<i class="icon-paperplane ml-2"></i></a>
                      </div>         
                      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card bg-white border-0 mb-0">
                                <div class="card-header bg-transparent pb-2ß">
                                  <div class="text-dark text-center mt-2 mb-3">Enter account pin to complete request</div>
                                </div>
                                <div class="card-body px-lg-5 py-lg-5">
                                  <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text text-dark"><i class="ni ni-lock-circle-open"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="Pin" type="pin" name="pin">
                                    </div>
                                  </div>
                                <div class="text-right">
                                  <button type="submit" class="btn btn-primary" form="modal-details">Submit</button>
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      @foreach($transfer as $k=>$val)
          <div class="col-md-4">
            <div class="card bg-white">
              <!-- Card body -->
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-8">
                    <!-- Title -->
                    <h4 class="mb-0">
                      <a href="JAVASCRIPT:VOID;" class="text-success">#{{$val->ref_id}}</a>
                    </h4>
                  </div>
                  <div class="col ml--2">
                    <p class="text-sm text-dark mb-0">Sender: {{$val->sender['username']}}</p>
                    <p class="text-sm text-dark mb-0">Receiver: {{$val->receiver['username']}}</p>
                    <p class="text-sm text-dark mb-0">Amount: {{substr($val->amount,0,9).$val->plan->symbol}}</p>
                    <p class="text-sm text-dark mb-0">Created: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                    <span class="badge badge-pill badge-primary">Charge: {{$val->amount*$set->transfer_charge/100}}{{$val->plan->symbol}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        @endforeach 
      </div>
@stop