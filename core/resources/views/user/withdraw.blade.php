@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-white">
          <div class="card-body">
            <div class="">
              <h3 class="">You can send cash out request for balance.</h3>
              <p class="mt-0 mb-5">Service charge is {{$set->withdraw_charge}}%.</p>
              <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i class="fa fa-arrow-right"></i> Create request</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-white border-0 mb-0">
                  <div class="card-body px-lg-5 py-lg-5">
                    <form action="{{route('withdraw.submit')}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">Amount</label>
                        <div class="col-lg-10">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text">{{$currency->symbol}}</span>
                            </div>
                            <input type="number" step="any" name="amount" maxlength="10" class="form-control" required="">
                          </div>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">Method</label>
                        <div class="col-lg-10">
                        <select class="form-control select" name="coin" data-dropdown-css-class="bg-primary" data-fouc required>
                        @foreach($method as $val)
                          <option value='{{$val->id}}'>{{$val->method}}</option>
                        @endforeach
                        </select>
                      </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">Details</label>
                        <div class="col-lg-10">
                          <textarea name="details" class="form-control" rows="4" required></textarea>
                        </div>
                      </div>                
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <div class="row">
      @foreach($withdraw as $k=>$val)
        <div class="col-md-4">
          <div class="card bg-white">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <!-- Title -->
                  <h4 class="mb-0">
                    <a href="JAVASCRIPT:VOID;" class="text-primary">#{{$val->reference}}</a>
                  </h4>
                </div>
                <div class="col-4 text-right">
                  @if($val->status==0)
                    <a data-toggle="modal" data-target="#modal-forma{{$val->id}}" href="" class="btn btn-sm btn-danger">Details</a>
                  @endif
                </div>
              </div>
              <div class="row align-items-center">
                  <div class="col ml--2">
                    <p class="text-sm text-dark mb-0">Amount: {{$currency->symbol.number_format($val->amount)}}</p>
                    <p class="text-sm text-dark mb-0">Method: {{$val->wallet->method}}</p>
                    <p class="text-sm text-dark mb-0">Created: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                    <span class="badge badge-pill badge-info">Fee: {{$currency->symbol.number_format($val->amount*$set->withdraw_charge/100)}}</span>
                    @if($val->status==1)
                      <span class="badge badge-success">Approved</span>
                    @else
                      <span class="badge badge-danger">Pending</span>
                    @endif
                  </div>
                </div>
            </div>
          </div>
        </div> 
        <div class="modal fade" id="modal-forma{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-white border-0 mb-0">
                  <div class="card-body px-lg-5 py-lg-5">
                    <form action="{{url('user/withdraw-update')}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">Method</label>
                        <div class="col-lg-10">
                          <select class="form-control select" name="coin" data-fouc>
                          @foreach($method as $valx)
                            <option value='{{$valx->id}}'
                              @if($valx->id==$val->wallet->id)
                              selected
                              @endif
                              >{{$valx->method}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">Details</label>
                        <div class="col-lg-10">
                          <textarea name="details" class="form-control" rows="4">{{$val->details}}</textarea>
                          <input name="withdraw_id" type="hidden" value="{{$val->id}}">
                        </div>
                      </div>                
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      @endforeach
    </div>

@stop