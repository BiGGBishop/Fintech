
@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0">Upload proof</h3>
                <div class="header-elements">
              </div>
          </div>
          <div class="card-body">
          <form method="post" action="{{route('bank_transfersubmit')}}" enctype="multipart/form-data">
          @csrf
           <div class="form-group row">
              <div class="col-lg-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text">{{$currency->symbol}}</span>
                  </span>
                <input type="number" step="any" name="amount" max-length="10" class="form-control" placeholder="amount">
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                  <textarea type="text" class="form-control" rows="3" placeholder="Details" name="details" required></textarea>
              </div>
            </div> 
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang1" name="image" lang="en">
                <label class="custom-file-label" for="customFileLang1">Transfer proof</label>
              </div>
            </div> 
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Proceed</button>
            </div>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-white">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title mb-3 text-primary">Bank Details</h3>
                <ul class="list list-unstyled mb-0 text-dark">
                  <li>Name: {{$bank->name}}</li>
                  <li>Bank: {{$bank->bank_name}}</li>
                  <li>Address: {{$bank->address}}</li>
                  <li>Swift code: {{$bank->swift}}</li>
                  <li>Iban code: {{$bank->iban}}</li>
                  <li>Account number: {{$bank->acct_no}}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    </div>
@stop