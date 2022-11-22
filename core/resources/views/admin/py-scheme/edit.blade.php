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
                        <p class="text-danger"></p>
                        <form action="{{route('admin.plan.update')}}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{$plan->name}}" reqiured>
                                    <input type="hidden" name="id" value="{{$plan->id}}">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Monthly percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="percent" value="{{$plan->percent}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum amount:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="min_amount" value="{{$plan->min_deposit}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">{{$currency->name}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Maximum amount:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="max_amount" value="{{$plan->amount}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">{{$currency->name}}</span>
                                        </span>
                                    </div>
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