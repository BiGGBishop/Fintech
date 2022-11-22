@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-white">
          <div class="card-body">
            <div class="">
              <h3 class="">Acct - #{{$user->acct_no}}</h3>
              <a href="{{route('user.ticket')}}" class="btn btn-sm btn-neutral">Open ticket</a>
              @if($user->upgrade==0)
              <a href="#" data-toggle="modal" data-target="#modal-formx" class="btn btn-sm btn-neutral">Upgrade account</a>
              @else
                @if($set->py_scheme==1)
              <a href="{{route('user.plans')}}" class="btn btn-sm btn-neutral">PY scheme</a>
                @endif
              @endif
              <a href="{{route('user.statement')}}" class="btn btn-sm btn-neutral">Transaction History</a>
              <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                          <div class="text-left mt-2 mb-3">Don't let your money sit there, upgrade your account & start investing in PY(per year) scheme and have unrestricted access to loans</div> 
                          <div class="text-left mt-2 mb-3">Upgrade fee costs {{$set->upgrade_fee.$currency->name}} . Check PY scheme to see what your money is invested on.</div> 
                            <div class="text-left">
                            <a href="{{route('user.upgrade')}}" class="btn btn-neutral">Upgrade</a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card bg-white border-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h3 class="card-title mb-0">2fa security</h3>
                <span class="badge badge-pill badge-primary">
                  @if($user->fa_status==0)
                    Disabled
                  @else
                    Active
                  @endif
                </span>
              </div>
            </div>
          </div>
        </div>
        @if($set->kyc==1)
          @if($user->kyc_status==0)
            <div class="card bg-white">
              <div class="card-body">
                <h3 class="card-title mb-3 text-dark">Identity verification</h3>
                <p class="card-text mb-4 text-primary">Upload an identity document, for example, driver licence, voters card, international passport, national ID.</p>
                <span class="badge badge-pill badge-info">
                  @if($user->kyc_status==0)
                    Unverified
                  @else
                    Verified
                  @endif
                </span>
                @if(empty($user->kyc_link))
                  <div class="row align-items-center">
                    <div class="col-12 text-right">
                      <a href="{{route('user.profile')}}#kyc" class="btn btn-sm btn-neutral">Upload</a>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          @endif
        @endif
        @if($set->merchant==1)
          <div class="card bg-white shadow">
            <!-- Card header -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Title -->
                  <h5 class="h4 mb-0 text-success">Start receiving payment from any website</h5>
                </div>
              </div>
              <p class="card-text mb-4 text-dark">Receiving money on your website is now easy with simple integeration at a fee of {{$set->merchant_charge}}% per transaction</p>
              <a href="{{route('submit.merchant')}}"><i class="fa fa-arrow-right"></i> Become a merchant</a>
            </div>
          </div>
        @endif 
        @if($set->asset==1)
          <div class="card bg-white shadow">
            <!-- Card header -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Title -->
                  <h5 class="h4 mb-0 text-success">Asset management <span class="badge badge-pill badge-info">Interest: depends on asset</span></h5>
                </div>
              </div>
              <p class="card-text mb-4 text-dark">Join our program and learn to invest on asset. Earn from buying, selling and exchanging assets. Asset can also be transferred within platform. The value of asset changes every 1hour based on live market prices</p>
              <a href="{{route('user.buyasset')}}"><i class="fa fa-arrow-right"></i> Buy asset</a>
            </div>
          </div>
        @endif          
        @if($set->save==1)
          <div class="card bg-white shadow">
            <!-- Card header -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Title -->
                  <h5 class="h4 mb-0 text-success">Savings <span class="badge badge-pill badge-info">Interest: {{$set->saving_charge}}%</span></h5>
                </div>
              </div>
              <p class="card-text mb-4 text-dark">Join our program and learn to save wisely ahead for your future. Funds won't be available still target date is reached.</p>
              <a href="{{route('user.save')}}"><i class="fa fa-arrow-right"></i> Get started</a>
            </div>
          </div>
        @endif 
        @if($set->py_scheme==1)
          <div class="card bg-white shadow">
            <!-- Card header -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Title -->
                  <h5 class="h4 mb-0 text-success">Py scheme <span class="badge badge-pill badge-info">plan based</span></h5>
                </div>
              </div>
              <p class="card-text mb-4 text-dark">A yearly investment feature that gives you the oppurtunity to earn more. Let your money work for you by learning to take advantage of py scheme plan. Invest today and save tomorrow. </p>
              <a href="{{route('user.plans')}}"><i class="fa fa-arrow-right"></i> Check out plans</a>
            </div>
          </div>
        @endif
        @if($set->loan==1)
          <div class="card bg-white shadow">
            <!-- Card header -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Title -->
                  <h5 class="h4 mb-0 text-success">Loan <span class="badge badge-pill badge-info">Interest: {{$set->loan_interest}}%</span></h5>
                </div>
              </div>
              <p class="card-text mb-4 text-dark">We charge {{$set->loan_interest}}% of loaned amount as interest fee. Balance must exceed or equal to {{$set->collateral_percent}}% of loaned amount as collateral. Participation in save 4 me & PY scheme will not be allowed until loan is paid.</p>
              <a href="{{route('user.loan')}}"><i class="fa fa-arrow-right"></i> Apply</a>
            </div>
          </div>
        @endif  
      </div> 
      <div class="col-lg-8">
        <div class="row">
          @foreach($asset as $k=>$val)
            <div class="col-lg-4">
              <div class="card border-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title mb-0">{{$val->plan->name}}</h5>
                      <span class="h2 font-weight-bold mb-0 text-success">{{substr($val->amount,0,9).$val->plan->symbol}}</span><br>
                      <span class="h5 font-weight-bold mb-0 text-primary">{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-white shadow">
              <div class="card-header bg-transparent">
                <h3 class="mb-0 text-black">Recent timeline</h3>
              </div>
              <div class="card-body">
                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                  @foreach($alertx as $hh)
                      <div class="timeline-block">
                        <span class="timeline-step badge-primary">
                          <i class="ni ni-like-2"></i>
                        </span>
                        <div class="timeline-content">
                          <small class="text-dark font-weight-bold">{{date("Y/m/d h:i:A", strtotime($hh->created_at))}}</small>
                          <h5 class="text-primary mt-3 mb-0">#{{$hh->reference}}</h5>
                          <p class="text-primary text-sm mt-1 mb-0">Date: {{$hh->created_at}},  Amt: {{number_format($hh->amount).$currency->name}}, Ref: {{$hh->reference}}, Desc: {{$hh->details}}</p>
                          <div class="mt-3">
                            <span class="badge badge-pill badge-primary">
                              @if($hh->type==1)
                                Debit
                              @elseif($hh->type==2)
                                Credit
                              @endif
                            </span>
                            <span class="badge badge-pill badge-secondary">
                              @if($hh->status==1)
                                Successful
                              @elseif($hh->status==0)
                                Pending
                              @endif
                            </span>
                          </div>
                        </div>
                      </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header header-elements-inline">
                <h3 class="mb-0">Asset rate</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="">
                      <tr>
                        <th>S/n</th>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Reserve</th>
                        <th>Coin</th>
                        <th>Buying</th>
                        <th>Selling</th>
                        <th>Exchange</th>
                      </tr>
                    </thead>
                    <tbody>  
                    @foreach($plan as $k=>$val)
                      <tr>
                        <td>{{++$k}}.</td>
                        <td>{{$val->name}}</td>
                        <td class="text-red">1 USD = {{$val->price.$val->symbol}}</td>
                        <td class="text-blue">{{substr($val->balance,0,9).$val->symbol}}</td>
                        <td>                      
                          @if($val->coin==1)
                            <span class="badge badge-success">Yes</span>
                          @elseif($val->coin==0)
                            <span class="badge badge-danger">No</span>                  
                          @endif
                        </td>
                        <td>{{$val->buying_charge}}%</td>
                        <td>{{$val->selling_charge}}%</td>
                        <td>{{$val->exchange_charge}}%</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>   
        </div>
      </div>
    </div>
@stop