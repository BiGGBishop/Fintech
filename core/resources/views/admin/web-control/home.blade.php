@extends('master')

@section('content')
<div class="content"> 
    <div class="row">   
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Edit content</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('homepage.update')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Header title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="header_title" class="form-control" value="{{$ui->header_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Header body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="header_body" rows="4" class="form-control">{{$ui->header_body}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Brand title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s1_title" class="form-control" value="{{$ui->s1_title}}">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 1 title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s2_title" class="form-control" value="{{$ui->s2_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 1 body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s2_body" rows="4" class="form-control">{{$ui->s2_body}}</textarea>
                            </div>
                        </div>                          
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 2 title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s3_title" class="form-control" value="{{$ui->s3_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 2 body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s3_body" rows="4" class="form-control">{{$ui->s3_body}}</textarea>
                            </div>
                        </div>                          
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 3 title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s4_title" class="form-control" value="{{$ui->s4_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 3 body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s4_body" rows="4" class="form-control">{{$ui->s4_body}}</textarea>
                            </div>
                        </div>                          
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 4 title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s8_title" class="form-control" value="{{$ui->s8_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 4 body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s8_body" rows="4" class="form-control">{{$ui->s8_body}}</textarea>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Faq title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s5_title" class="form-control" value="{{$ui->s5_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Faq body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s5_body" rows="4" class="form-control">{{$ui->s5_body}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 5 title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s6_title" class="form-control" value="{{$ui->s6_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 5 body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s6_body" rows="4" class="form-control">{{$ui->s6_body}}</textarea>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 6 title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s9_title" class="form-control" value="{{$ui->s9_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Section 6 body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s9_body" rows="4" class="form-control">{{$ui->s9_body}}</textarea>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Review title:</label>
                            <div class="col-lg-10">
                                <input type="text" name="s7_title" class="form-control" value="{{$ui->s7_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Review body:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="s7_body" rows="4" class="form-control">{{$ui->s7_body}}</textarea>
                            </div>
                        </div>      
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Submit<i class="icon-paperplane ml-2"></i></button>
                        </div>
                </form>
            </div>
            </div>    
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Section 1</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/images/{{$ui->s2_image}}" alt="" style="max-width:30%; height:auto;">
                    </div>
                    <form action="{{url('admin/section1/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="section1" class="form-input-styled" data-fouc required> 
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>           
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Section 2</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/images/{{$ui->s3_image}}" alt="" style="max-width:30%; height:auto;">
                    </div>
                    <form action="{{url('admin/section2/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="section2" class="form-input-styled" data-fouc required> 
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>            
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Section 3</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/images/{{$ui->s4_image}}" alt="" style="max-width:30%; height:auto;">
                    </div>
                    <form action="{{url('admin/section3/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="section3" class="form-input-styled" data-fouc required> 
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>            
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Section 4</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/images/{{$ui->s7_image}}" alt="" style="max-width:30%; height:auto;">
                    </div>
                    <form action="{{url('admin/section4/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="section4" class="form-input-styled" data-fouc required> 
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>            
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Section 5</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/images/{{$ui->s8_image}}" alt="" style="max-width:30%; height:auto;">
                    </div>
                    <form action="{{url('admin/section8/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="section8" class="form-input-styled" data-fouc required> 
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>            
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Section 6</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/images/{{$ui->s9_image}}" alt="" style="max-width:30%; height:auto;">
                    </div>
                    <form action="{{url('admin/section9/update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="section9" class="form-input-styled" data-fouc required> 
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop