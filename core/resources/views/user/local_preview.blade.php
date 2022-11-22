@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card bg-white">
        <div class="card-body">
          <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
            <div>
              <ul class="list list-unstyled mb-0">
                <li>Amount: <span class="font-weight-semibold">{{$currency->symbol.number_format($amount)}}</span></li>
                <li>Account number: <span class="font-weight-semibold">{{$acct_no}}</span></li>
                <li>Name: <span class="font-weight-semibold">{{$acct_name}}</span></li>
                <li>Transfer fee: <span class="font-weight-semibold">{{$currency->symbol.number_format($amount*$set->transfer_charge/100)}}</span></li>
                <li>Total: <span class="font-weight-semibold">{{$currency->symbol.number_format($amount+($amount*$set->transfer_charge/100))}}</span></li>
              </ul>
            </div>
          </div><br>
          <form action="{{route('submit.localpreview')}}" method="post">
            @csrf
            <input type="hidden" name="acct_no" value="{{$acct_no}}">
            <input type="hidden" name="amount" value="{{$amount}}">
            <button type="submit" class="btn btn-primary btn-sm">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop