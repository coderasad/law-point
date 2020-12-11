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
                <a href="{{ URL::to('portfolio') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-md-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Edit Portfolio Section</h4>
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
                        <form class="" action="{{ url('portfolio/'.$db->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row form-group">
                                <label for="title" class="col-2">portfolio Title</label>
                                <input class="form-control col-6 placement" maxlength="30" id="title" name="title" type="text" value="{{$db->title}}" >
                            </div>
                            <div class="row form-group">
                                <label for="portfolio_cat_id" class="col-2">Category Name</label>
                                <select class="form-control col-6" name="portfoliocategory_id" id="portfolio_cat_id">
                                    @foreach ($dbCategory as $data)
                                        @if ($db->portfoliocategory_id == $data->id)
                                            <option selected value="{{$data->id}}">{{$data->name}}</option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-2">portfolio Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="img"  id="imgInp">                                    
                                    <input value="public/frontend/images/portfolio/{{ $db->img }}" name="old_img" type="hidden">     
                                    <div class="text-danger ">Image size must be width: <b>700px</b> and height: <b>400px</b></div>
                                </div>
                                <div class="col-4 offset-2 mt-4">
                                    <img src="../../public/frontend/images/portfolio/{{ $db->img }}" id="img_show" width="80"/>    
                                </div>
                            </div>                          
                            <div class="row form-group">
                                <label for="sub_title" class="col-2"></label>
                                <button type="Update" class="btn btn-danger waves-effect waves-light">Update</button>
                            </div>
                        </form>                           
                    </div>
                </div>
            </div> 
        </div><!-- end row -->
    </div><!-- container -->
@endsection