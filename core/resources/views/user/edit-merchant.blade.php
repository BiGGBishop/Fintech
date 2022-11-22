@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-white">
            <div class="card-body">
                <div class="">
                    <h3 class="">Start receiving payment from any website</h3>
                    <a href="{{route('user.add-merchant')}}" class="btn btn-sm btn-neutral">Create merchant</a>
                    <a href="{{url('/')}}/user/merchant-documentation" class="btn btn-sm btn-neutral">Documentation</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">Edit merchant</h3>
                <div class="header-elements">
                  <div class="list-icons">
                </div>
              </div>
          </div>
          <div class="card-body">
            <form action="{{route('update.merchant')}}" enctype="multipart/form-data" method="post">
            @csrf
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Business logo</label>
                    <div class="col-lg-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept="image/*">
                            <label class="custom-file-label" for="customFileLang">Select photo</label>
                        </div>
                    </div>
              </div> 
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Merchant name</label>
                  <div class="col-lg-10">
                    <input type="text" name="name" class="form-control" value="{{$merchant->name}}">
                    <input type="hidden" name="id" value="{{$merchant->id}}">
                  </div>
                </div> 
               <div class="form-group row">
                  <label class="col-form-label col-lg-2">Merchant site url</label>
                  <div class="col-lg-10">
                    <input type="url" name="site_url" class="form-control" value="{{$merchant->site_url}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-2">Merchant Description</label>
                  <div class="col-lg-10">
                    <div class="input-group">
                      <textarea type="text" class="form-control" rows="4" name="description">{{$merchant->description}}</textarea>
                    </div>
                  </div>
                </div>                     
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></a>
                </div>         
            </form>
          </div>
        </div>
        <!-- /basic layout -->
      </div>
    </div>
@stop