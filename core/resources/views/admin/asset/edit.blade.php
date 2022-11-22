@extends('master')

@section('content')
    <div class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit</h6>
                    </div>
                    <div class="card-body">
                    <p class="text-danger"><a href="https://free.currconv.com/api/v7/currencies?apiKey=do-not-use-this-key">currency list</a></p>
                        <form action="{{route('admin.asset.update')}}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{$plan->name}}" reqiured>
                                    <input type="hidden" name="id" value="{{$plan->id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Symbol:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="symbol" value="{{$plan->symbol}}" class="form-control text-uppercase">
                                </div>
                                </div>  
                            @if($set->auto==0)
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Price:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">1 USD =</span>
                                    </span>
                                    <input type="number" step="any" value="{{$plan->price}}" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Balance:</label>
                                <div class="col-lg-10">
                                    <input type="number" step="any" value="{{substr($plan->balance,0,9)}}" class="form-control" name="balance">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Exchange charge:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                    <input type="number" step="any" value="{{$plan->exchange_charge}}" name="exchange_charge" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Buying charge:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                    <input type="number" step="any"value="{{$plan->buying_charge}}" name="buying_charge" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    </div>
                                </div>
                            </div>               
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Selling charge:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                    <input type="number" step="any" name="selling_charge" value="{{$plan->selling_charge}}" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Referral percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                    <input type="number" step="any" name="ref_percent" value="{{$plan->ref_percent}}" class="form-control">
                                    <span class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Coin:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="coin">
                                        <option value="1" 
                                        @if($plan->coin==1)
                                            selected
                                        @endif
                                            >Yes
                                        </option>                                        
                                        <option value="0" 
                                        @if($plan->coin==0)
                                            selected
                                        @endif
                                            >No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="status">
                                        <option value="1" 
                                            @if($plan->status==1)
                                                selected
                                            @endif
                                            >Active
                                        </option>
                                        <option value="0"  
                                            @if($plan->status==0)
                                                selected
                                            @endif
                                            >Deactive
                                        </option>
                                    </select>
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
    </div>

@stop