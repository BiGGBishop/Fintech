@extends('userlayout')
@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="align-item-sm-center flex-sm-nowrap text-center">
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <div id="paystackEmbedContainer"></div>
            <form action="{{url('/')}}/ipnpaystack" method="POST">
                <script>
                    PaystackPop.setup({
                        key:'{{$paystack['value1']}}',
                        email:'{{$user->email}}',
                        amount:'{{ $paystack['amount'] }}00',
                        container:'paystackEmbedContainer',
                        currency:'{{$currency->name}}',
                        reference:'{{ $paystack['track'] }}',
                    });
                </script>
            </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection