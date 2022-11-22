
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
            <div class="col-lg-12">
                <div class="card bg-white shadow">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-dark">How to integerate payment gateway</h3>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col ml--2">
                                <p class="text-sm text-dark mb-0">Copy form to webpage to integerate gateway.</p>
                                <br>
                                <pre style="background-color:#eee; border:thin solid #ccc; padding:10px; margin: 10px;">
                                &lt;form method='POST'  action='{{url('/')}}/ext_transfer' &gt;
                                &lt;input type='hidden' name='merchant_key' value='MERCHANT KEY' /&gt;
                                &lt;input type='hidden' name='success_url' value='//www.mydomain.com/success.html' /&gt;
                                &lt;input type='hidden' name='fail_url' value='//www.mydomain.com/failed.html' /&gt;
                                &lt;input type='hidden' name='notify_url' value='//www.mydomain.com/notify.php' /&gt;
                                &lt;input type='hidden' name='amount' value='10000' /&gt;
                                &lt;input type='submit' value='submit' /&gt;
                                &lt;/form&gt;
                                </pre>                          
                            </div>
                        </div>
                    </div>
                </div>                

                <div class="card bg-white shadow">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-dark">Requirements</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush">
                            <thead class="">
                                <tr>
                                <th>S/N</th>
                                <th>Value</th>
                                <th>Type</th>
                                <th>Required</th>
                                </tr>
                            </thead>
                            <tbody>  
                                <tr>
                                    <td>1.</td>
                                    <td>Merchant key</td>
                                    <td>Alphanumeric</td>
                                    <td>Yes</td>
                                </tr>                                            
                                <tr>
                                    <td>2.</td>
                                    <td>Success url</td>
                                    <td>Url</td>
                                    <td>Yes</td>
                                </tr>                                            
                                <tr>
                                    <td>3.</td>
                                    <td>Fail url</td>
                                    <td>Url</td>
                                    <td>Yes</td>
                                </tr>                                             
                                <tr>
                                    <td>4.</td>
                                    <td>Notify url</td>
                                    <td>Url</td>
                                    <td>Yes</td>
                                </tr>                                            
                                <tr>
                                    <td>5.</td>
                                    <td>Amount</td>
                                    <td>Numeric</td>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop