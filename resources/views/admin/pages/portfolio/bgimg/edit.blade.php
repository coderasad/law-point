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
            <div class="col-md-2 mt-3">
                <a href="{{ URL::to('bgimg') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-md-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Edit background Image</h4>
            </div>       
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="" action="{{ url('bgimg/'.$db->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="row form-group mb-5">
                                <label for="imgInp" class="col-2">About Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="about_img"  id="imgInp">
                                    <input value="public/frontend/images/bg/{{ $db->about_img }}" name="old_about_img" type="hidden" >
                                    <div class="text-danger ">Image must be width: <b>1900px</b> and height: <b>700px</b></div>
                                </div>
                                <div class="col-4">
                                    <img src="../../public/frontend/images/bg/{{ $db->about_img }}" id="img_show" width="80"/> 
                                </div>
                            </div>                            
                            <div class="row form-group mb-5">
                                <label for="imgInp1" class="col-2">Service Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="service_img"  id="imgInp1">
                                    <input value="public/frontend/images/bg/{{ $db->service_img }}" name="old_service_img" type="hidden" >
                                    <div class="text-danger ">Image must be width: <b>1900px</b> and height: <b>700px</b></div>
                                </div>
                                <div class="col-4">
                                    <img class="mb-3" src="../../public/frontend/images/bg/{{ $db->service_img }}" id="img_show1" width="80"/>
                                </div>
                            </div>                           
                            <div class="row form-group mb-5">
                                <label for="imgInp2" class="col-2">Portfoli Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="portfolio_img"  id="imgInp2">
                                    <input value="public/frontend/images/bg/{{ $db->portfolio_img }}" name="old_portfolio_img" type="hidden" >
                                    <div class="text-danger ">Image must be width: <b>1900px</b> and height: <b>700px</b></div>
                                </div>
                                <div class="col-4">
                                    <img class="mb-3" src="../../public/frontend/images/bg/{{ $db->portfolio_img }}" id="img_show2" width="80"/>
                                </div>
                            </div>                           
                            <div class="row form-group mb-5">
                                <label for="imgInp3" class="col-2">Contact Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="contact_img"  id="imgInp3">
                                    <input value="public/frontend/images/bg/{{ $db->contact_img }}" name="old_contact_img" type="hidden" >
                                    <div class="text-danger ">Image must be width: <b>1900px</b> and height: <b>700px</b></div>
                                </div>
                                <div class="col-4">
                                    <img class="mb-3" src="../../public/frontend/images/bg/{{ $db->contact_img }}" id="img_show3" width="80"/>
                                </div>
                            </div>                       
                            <div class="row form-group">
                                <label for="sub_title" class="col-2"></label>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Update</button>
                            </div>
                        </form>                         
                    </div>
                </div>
            </div> 
        </div><!-- end row -->
    </div><!-- container -->
@endsection