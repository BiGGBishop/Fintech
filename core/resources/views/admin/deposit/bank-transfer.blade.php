@extends('master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Update Bank Details</h6>
                        <div class="header-elements">
                            <span class="font-weight-semibold">Last updated: {{date("Y/m/d h:i:A", strtotime($bank->updated_at))}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/bankdetails')}}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" value="{{$bank->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Bank name:</label>
                                <div class="col-lg-10">
                                <input type="text" name="bank_name" class="form-control" value="{{$bank->bank_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Bank address:</label>
                                <div class="col-lg-10">
                                <input type="text" name="address" class="form-control" value="{{$bank->address}}">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">IBAN code:</label>
                                <div class="col-lg-10">
                                <input type="text" name="iban" class="form-control" value="{{$bank->iban}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">SWIFT code:</label>
                                <div class="col-lg-10">
                                <input type="text" name="swift" class="form-control" value="{{$bank->swift}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Account number:</label>
                                <div class="col-lg-10">
                                <input type="number" name="acct_no" class="form-control" value="{{$bank->acct_no}}">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if($bank->status==1)
                                                <input type="checkbox" name="status" class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="status" class="form-check-input-switchery" value="1">
                                            @endif       
                                        </label>
                                    </div>
                                </div>
                            </div>               
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Update<i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Bank transfer</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Amount</th>                                                                       
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($deposit as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->user->id}}">{{$val->user->name}}</a></td>
                                    <td>{{number_format($val->amount).$currency->name}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($val->status==2)
                                            <span class="badge badge-info">Declined</span> 
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
                                                @if($val->status==0)
                                                    <a class='dropdown-item' href="{{url('/')}}/admin/approvebk/{{$val->id}}"><i class="icon-thumbs-up3 mr-2"></i>Approve request</a>
                                                    <a class='dropdown-item' href="{{url('/')}}/admin/declinebk/{{$val->id}}"><i class="icon-thumbs-down3 mr-2"></i>Decline request</a>
                                                @endif
                                                    <a data-toggle="modal" data-target="#{{$val->id}}delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                                    <a data-toggle="modal" data-target="#{{$val->id}}screenshot" class="dropdown-item"><i class="icon-image2 mr-2"></i>Screenshot</a>
                                                    <a data-toggle="modal" data-target="#{{$val->id}}details" class="dropdown-item"><i class="icon-share2 mr-2"></i>Transfer details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>                   
                                </tr>
                                <div id="{{$val->id}}delete" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="font-weight-semibold">Are you sure you want to delete this?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                <a  href="{{url('/')}}/admin/bank_transfer/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="{{$val->id}}details" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h6 class="font-weight-semibold">{{$val->details}}</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div id="{{$val->id}}screenshot" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{url('/')}}/asset/screenshot/{{$val->image}}" style="height:auto;max-width:100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach               
                            </tbody>                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop