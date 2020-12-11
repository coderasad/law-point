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
                <a href="{{ URL::to('footer') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Add footer Section</h4>
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
                        <form class="" action="{{URL::to('footer')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="title1" class="">Title One</label>
                                    <input class="form-control placement"  maxlength="20" id="title1" name="title1" type="text" placeholder="About us..." >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title2" class="">Title Two</label>
                                    <input class="form-control placement"  maxlength="20" id="title2" name="title2" type="text" placeholder="Social link..." >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title3" class="">Title Three</label>
                                    <input class="form-control placement"  maxlength="20" id="title3" name="title3" type="text" placeholder="Contact Detalis..." >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="office" class="">Office</label>
                                    <input class="form-control placement"  maxlength="100" id="office" name="office" type="text" placeholder="Office Address..." >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="email" class="">Email</label>
                                    <input class="form-control placement"  maxlength="30" id="email" name="email" type="email" placeholder="Email..." >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hours" class="">Office Hours</label>
                                    <input class="form-control placement"  maxlength="100" id="hours" name="hours" type="text" placeholder="Office hours..." >
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="imgInp">Image</label>
                                    <div class="custom-file">                                
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                        <input type="file" class="custom-file-input" name="img"  id="imgInp">
                                        <div class="text-danger ">Image must be width: <b>1920px</b> and height: <b>720px</b></div>
                                    </div>
                                    <div class="col-4 offset-2 mt-4">
                                        <img class="mb-3" src="" id="img_show" width="80"/>
                                    </div>
                                </div>
                                
                                 
                                <div class="form-group col-md-6">
                                    <label for="description" class="">Title One Description</label>
                                    <textarea class="form-control textarea"  maxlength="200" name="description" id="description" placeholder="Description..."  rows="4"></textarea>
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