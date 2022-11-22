@extends('master')

@section('content')
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Congifure website</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.settings.update')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Company / website name:</label>
                            <div class="col-lg-10">
                                <input type="text" name="site_name" maxlength="200" value="{{$set->site_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tawk ID:</label>
                            <div class="col-lg-10">
                                <input type="text" name="tawk_id" value="{{$set->tawk_id}}" maxlength="25" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Company email:</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" value="{{$set->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Mobile:</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" name="mobile" max-length="14" value="{{$set->mobile}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Website title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="title" max-length="200" value="{{$set->title}}" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><a href="https://free.currencyconverterapi.com">currconv api key</a>:</label>
                            <div class="col-lg-10">
                                <input type="text" name="api" max-length="200" value="{{$set->api}}" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Intra Bank transfer fee <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="transfer_charge" max-length="10" value="{{$set->transfer_charge}}" class="form-control">
                                </div>
                            </div>
                            <label class="col-form-label col-lg-2">Inter Bank transfer fee <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">%</span>
                                </span>
                                <input type="number" name="transfer_chargex" max-length="10" value="<?php echo $set['transfer_chargex'];?>" class="form-control">
                                </div>
                            </div>
                            <label class="col-form-label col-lg-2">Balance on signup <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">{{$currency->name}}</span>
                                    </span>
                                    <input type="number" name="bal" max-length="10" value="{{$set->balance_reg}}" class="form-control">
                                </div>
                            </div>                            
                            <label class="col-form-label col-lg-2">Upgrade fee <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">{{$currency->name}}</span>
                                    </span>
                                    <input type="number" name="upgrade_fee" max-length="10" value="{{$set->upgrade_fee}}" class="form-control">
                                </div>
                            </div>                            
                            <label class="col-form-label col-lg-2">Loan interest <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="loan_interest" max-length="10" value="{{$set->loan_interest}}" class="form-control">
                                </div>
                            </div>                             
                            <label class="col-form-label col-lg-2">Gradient 1 <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                    </span>
                                    <input type="text" name="gradient1" max-length="10" value="{{$set->gradient1}}" class="form-control">
                                </div>
                            </div>                            
                            <label class="col-form-label col-lg-2">Gradient 2 <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                    </span>
                                    <input type="text" name="gradient2" max-length="10" value="{{$set->gradient2}}" class="form-control">
                                </div>
                            </div>                            
                            <label class="col-form-label col-lg-2">Saving interest <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="saving_interest" max-length="10" value="{{$set->saving_interest}}" class="form-control">
                                </div>
                            </div>                              
                            <label class="col-form-label col-lg-2">Saving charge <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="saving_charge" max-length="10" value="{{$set->saving_charge}}" class="form-control">
                                </div>
                            </div>                            
                            <label class="col-form-label col-lg-2">Withdraw charge <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="withdraw_charge" max-length="10" value="{{$set->withdraw_charge}}" class="form-control">
                                </div>
                            </div>                             
                            <label class="col-form-label col-lg-2">Merchant charge <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="merchant_charge" max-length="10" value="{{$set->merchant_charge}}" class="form-control">
                                </div>
                            </div>                            
                            <label class="col-form-label col-lg-2">Collateral percent <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </span>
                                    <input type="number" name="collateral_percent" max-length="10" value="{{$set->collateral_percent}}" class="form-control">
                                </div>
                            </div>
                        </div>           
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->kyc==1)
                                        <input type="checkbox" name="kyc" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="kyc" class="form-check-input-switchery" value="1">
                                    @endif
                                    KYC       
                                    </label>
                                </div> 
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->email_verification==1)
                                        <input type="checkbox" name="email_activation" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="email_activation" class="form-check-input-switchery" value="1">
                                    @endif
                                    Email verification       
                                    </label>
                                </div>   
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->sms_verification==1)
                                        <input type="checkbox" name="sms_activation" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="sms_activation" class="form-check-input-switchery" value="1">
                                    @endif
                                    SMS Verification       
                                    </label>
                                </div>                                 
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->email_notify==1)
                                        <input type="checkbox" name="email_notify" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="email_notify" class="form-check-input-switchery" value="1">
                                    @endif
                                    Email notify       
                                    </label>
                                </div>                                 
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->sms_notify==1)
                                        <input type="checkbox" name="sms_notify" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="sms_notify" class="form-check-input-switchery" value="1">
                                    @endif
                                    SMS notify       
                                    </label>
                                </div> 
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->registration==1)
                                        <input type="checkbox" name="registration" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="registration" class="form-check-input-switchery" value="1">
                                    @endif
                                    Registration       
                                    </label>
                                </div>                                                                  
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->loan==1)
                                        <input type="checkbox" name="loan" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="loan" class="form-check-input-switchery" value="1">
                                    @endif
                                    Loan       
                                    </label>
                                </div>                                 
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->save==1)
                                        <input type="checkbox" name="save" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="save" class="form-check-input-switchery" value="1">
                                    @endif
                                    Save 4 me       
                                    </label>
                                </div>                              
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->auto==1)
                                        <input type="checkbox" name="auto" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="auto" class="form-check-input-switchery" value="1">
                                    @endif
                                    Automated exchange rate       
                                    </label>
                                </div>                                
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->asset==1)
                                        <input type="checkbox" name="asset" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="asset" class="form-check-input-switchery" value="1">
                                    @endif
                                    Asset management       
                                    </label>
                                </div>                                 
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                    @if($set->merchant==1)
                                        <input type="checkbox" name="merchant" class="form-check-input-switchery" value="1" checked>
                                    @else
                                        <input type="checkbox" name="merchant" class="form-check-input-switchery" value="1">
                                    @endif
                                    Merchant       
                                    </label>
                                </div> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Short description:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="site_desc" rows="4" class="form-control">{{$set->site_desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Address:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="address" rows="4" class="form-control">{{$set->address}}</textarea>
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