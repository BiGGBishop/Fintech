@extends('userlayout')

@section('content')
  <div class="container-fluid mt--6">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card bg-white">
            <div class="card-body">
              <div class="">
                <h3 class="">Per year scheme</h3>
                <a href="{{url('/')}}/user/plans#earnings" class="btn btn-sm btn-neutral">Track earnings</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      @foreach($plan as $val)
        <div class="col-md-4">
          <div class="pricing card-group flex-column flex-md-row mb-3">
            <div class="card card-pricing border-0 bg-white text-center mb-4">
              <div class="card-body px-lg-7">
                <div class="row">
                  <div class="col-10">
                    <!-- Title -->
                    <h4 class="text-uppercase ls-1 text-dark py-3 mb-0 text-left">{{$val->name}}</h4>
                  </div>
                  <div class="col-2 text-right">
                    <a href="#" data-toggle="modal" data-target="#calculate{{$val->id}}" class="btn btn-sm btn-neutral">Calculate</a>
                    <div class="modal fade" id="calculate{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-body p-0">
                            <div class="card bg-white border-0 mb-0">
                              <div class="card-header bg-transparent pb-5">
                                <div class="text-muted text-center mt-2 mb-3"><small>Calculate profit</small></div>
                                <div class="btn-wrapper text-center">
                                   <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">{{$val->name}}</h4>
                                </div>
                              </div>
                              <div class="card-body px-lg-5 py-lg-5">
                                <form role="form" action="{{url('user/calculate')}}" method="post">
                                @csrf
                                  <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">{{$currency->symbol}}</span>
                                      </div>
                                      <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                      <input type="hidden" name="plan_id" value="{{$val->id}}"> 
                                    </div>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-neutral my-4">Calculate</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                    <div class="modal fade" id="buy{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-body p-0">
                            <div class="card bg-white border-0 mb-0">
                              <div class="card-header bg-transparent pb-5">
                                <div class="text-muted text-center mt-2 mb-3"><small>Purchase plan</small></div>
                                <div class="btn-wrapper text-center">
                                   <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">{{$val->name}}</h4>
                                </div>
                              </div>
                              <div class="card-body px-lg-5 py-lg-5">
                                <form role="form" action="{{url('user/buy')}}" method="post">
                                @csrf
                                  <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">{{$currency->symbol}}</span>
                                      </div>
                                      <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                      <input type="hidden" name="plan" value="{{$val->id}}">
                                    </div>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Purchase</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="display-2 text-dark" style="font-size: 1.3rem;">{{$currency->symbol.$val->min_deposit}} - {{$currency->symbol.$val->amount}}</div>
                <p class="text-sm text-dark mb-0">{{$val->percent}}% monthly top up</p>
                <p class="text-sm text-dark mb-0">Interest {{($val->percent*castrotime('1 year'))-100}}%</p>
                <p class="text-sm text-dark mb-0">Compound interest  {{$val->percent*castrotime('1 year')}}%</p>
                <br>
                <a href="#" data-toggle="modal" data-target="#buy{{$val->id}}"  class="btn btn-sm btn-primary">Subscribe</a>
              </div>
            </div>
          </div>
        </div>
       @endforeach
      </div>
      <div class="row" id="earnings">
        @foreach($profit as $k=>$val)
          <div class="col-md-4">
            <div class="card bg-white">
              <!-- Card body -->
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                  </div>
                  <div class="col ml--2">
                    <h4 class="mb-0">
                      <a href="JAVASCRIPT:VOID;" class="text-primary">{{$val->plan->name}} <span class="badge badge-pill badge-danger">Ref: #{{$val->trx}}</span></a>
                    </h4>
                    <p class="text-sm text-dark mb-0">Started: {{date("Y/m/d h:i:A", strtotime($val->date))}}</p>
                    <p class="text-sm text-dark mb-0">Deposit: {{$currency->symbol.number_format($val->amount)}}</p>
                    <p class="text-sm text-dark mb-0">Monthly percent: {{$val->plan->percent}}%</p>
                    <span class="badge badge-pill badge-info">Pending rofit: {{$currency->symbol.number_format($val->profit)}}</span>
                    @if ($datetime<$val->end_date)
                      <span class="badge badge-success">Running</span>
                    @else
                      <span class="badge badge-primary">Ended</span>
                    @endif  
                  </div>
                </div>
              </div>
            </div>
          </div> 
        @endforeach
    </div>
@stop