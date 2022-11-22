@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-white">
          <div class="card-body text-dark">
            <div class="">
              <h3 class="text-primary">{{$gate->gateway['name']}}</h3>
              <span class="mt-0 mb-5">Amount:{{$currency->symbol.number_format($gate->amount)}}</span><br>
              <span class="mt-0 mb-5">Charge:{{$currency->symbol.$gate->charge}}</span><br>
              <span class="mt-0 mb-5">Total:{{$currency->symbol.number_format($gate->amount+$gate->charge)}}</span><br><br>
                <form action="{{route('deposit.confirm')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop