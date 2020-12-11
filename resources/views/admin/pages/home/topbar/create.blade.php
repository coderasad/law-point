@extends('admin.admin_layouts')
@section('admin_content')
@php
    $myScript =[   
        "http://localhost/a/law_point/public/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js",
        "http://localhost/a/law_point/public/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
        "http://localhost/a/law_point/public/backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js",
        "http://localhost/a/law_point/public/backend/pages/form-advanced.js",  
    ]
@endphp

    <div class="container-fluid">       
        <div class="row">
            <div class="col-2 mt-3">
                <a href="{{ URL::to('topbar') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Add Topbar Section</h4>
            </div>  
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                                                      
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="" action="{{URL::to('topbar')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="fb" class="">Facebook Link</label>
                                    <input class="form-control"  id="fb" target="_blank" name="fb_link" type="text" placeholder="www.facebook.com" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tw" class="">Twitter Link</label>
                                    <input class="form-control"  id="tw" target="_blank" name="tw_link" type="text" placeholder="www.twitter.com" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="in" class="">Linkedin Link</label>
                                    <input class="form-control"  id="in" target="_blank" name="in_link" type="text" placeholder="www.Linkedin.com" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="phone" class="">Phone</label>
                                    <input class="form-control"  id="phone" name="phone" type="text" placeholder="+88 017 00 00 00" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address" class="">Update News</label>
                                    <input class="form-control placement"  maxlength="200" id="address" name="news" type="text" placeholder="Update News here..." >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="footer_des" class="">Footer Description</label>
                                    <input class="form-control placement"  maxlength="190" id="footer_des" name="footer_des" type="text" placeholder="Footer Description here..." >
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" id="insert" class="btn btn-danger waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>                           
                    </div>
                </div>
            </div> 
        </div><!-- end row -->
    </div><!-- container -->
@endsection