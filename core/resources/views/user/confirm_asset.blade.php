@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <ul class="list list-unstyled mb-0 text-dark">
                  <li>From: <span class="font-weight-semibold">{{substr($amount,0,9).$fprice->symbol}}</span></li>
                  <li>To: <span class="font-weight-semibold">{{substr($trate,0,9).$tprice->symbol}}</span></li>
                  <li>Exchange fee: <span class="font-weight-semibold">{{$fprice->exchange_charge*$amount/100}}</span></li>
                  <li>Total: <span class="font-weight-semibold">{{(($amount)*(100-$fprice->exchange_charge)/100).$fprice->symbol}}</span></li>
                </ul>
              </div>
            </div>
            <div class="bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center">
            <span>
              <span class="badge badge-mark border-danger mr-2"></span>
            </span>
              <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                  <li class="list-inline-item">
                  <form action="{{route('submit.checkasset')}}" method="post">
                  @csrf
                    <input type="hidden" name="famount" value="{{(($amount)*(100-$fprice->exchange_charge)/100)}}">
                    <input type="hidden" name="tamount" value="{{$trate}}">
                    <input type="hidden" name="from" value="{{$from}}">
                    <input type="hidden" name="to" value="{{$to}}">
                    <button type="submit" class="btn btn-neutral">Confirm</button>
                  </form>
                </div>
                </li>
              </ul>
          </div>
          </div>
        <!-- /basic layout -->
      </div>
    </div>
@stop