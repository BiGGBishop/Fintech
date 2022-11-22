@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-white">
          <div class="card-body">
            <div class="">
            <h3 class="">Transaction history</h3>
            <p class="mt-0 mb-5">This is your account statement page, always keep track for your account history</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card bg-white shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col-8">
              <!-- Title -->
              <h3 class="mb-0 text-dark">Account timeline</h3>
            </div>
            <div class="col-4 text-right">
              <a href="javascript:void;" onclick="window.print();" class="btn btn-sm btn-neutral">Print</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
            @foreach($alert as $hh)
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
    </div>
  </div>
@stop