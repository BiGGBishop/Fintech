@extends('master')

@section('content')
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Congifure Twilio sms</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sms.update')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Twilio sid:</label>
                            <div class="col-lg-10">
                                <input type="text" name="twilio_sid" value="{{$val->twilio_sid}}" class="form-control">
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Twilio auth token:</label>
                            <div class="col-lg-10">
                                <input type="text" name="twilio_auth" value="{{$val->twilio_auth}}" class="form-control">
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Twilio number:</label>
                            <div class="col-lg-10">
                                <input type="text" name="twilio_number" value="{{$val->twilio_number}}" class="form-control">
                            </div>
                        </div>          
                    <div class="text-right">
                        <button type="submit" class="btn bg-dark">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
@stop