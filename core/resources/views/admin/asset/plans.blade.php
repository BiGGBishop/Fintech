@extends('master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Assets</h6>
                    </div>
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Rate</th>
                                    <th>Balance</th>
                                    <th>Exchange charge</th>
                                    <th>Buy charge</th>
                                    <th>Selling charge</th>
                                    <th>Ref percent</th>
                                    <th>Coin</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($plan as $k=>$val)
                                <tr>
                                    <td>{{$val->name}}</td>
                                    <td>1 NGN = {{$val->price.$val->symbol}}</td>
                                    <td>{{substr($val->balance,0,9).$val->symbol}}</td>
                                    <td>{{$val->exchange_charge}}%</td>
                                    <td>{{$val->buying_charge}}%</td>
                                    <td>{{$val->selling_charge}}%</td>
                                    <td>{{$val->ref_percent}}%</td>
                                    <td>                      
                                        @if($val->coin==1)
                                            <span class="badge badge-success">Yes</span>
                                        @elseif($val->coin==0)
                                            <span class="badge badge-danger">No</span>                  
                                        @endif
                                    </td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-danger">Disabled</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-success">Active</span> 
                                        @endif
                                    </td>  
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class='dropdown-item' href="{{url('/')}}/admin/asset-plan/{{$val->id}}"><i class="icon-pencil7 mr-2"></i>Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>                   
                                </tr>
                                @endforeach               
                            </tbody>                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop