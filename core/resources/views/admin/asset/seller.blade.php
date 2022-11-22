@extends('master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Logs</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Amount</th>                                                                       
                                    <th>Coin</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->user['id']}}">{{$val->user['name']}}</a></td>
                                    <td>{{substr($val->amount,0,9).$val->plan->symbol}}</td>
                                    <td>                      
                                        @if($val->plan->coin==1)
                                            <span class="badge badge-success">Yes</span>
                                        @elseif($val->plan->coin==0)
                                            <span class="badge badge-danger">No</span>                  
                                        @endif
                                    </td> 
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>  
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>                  
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