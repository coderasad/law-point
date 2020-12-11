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
                <a href="{{ URL::to('portfoliopage') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Add Portfolio Page</h4>
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
                        <form action="{{URL::to('portfoliopage')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="long_title">Title</label>
                                    <input class="form-control  placement"  maxlength="90" id="long_title" name="long_title" type="text" placeholder="Long Title" >
                                </div>
                                <div class="form-group col-6">
                                    <label for="short_title">Project Name</label>
                                    <input class="form-control  placement"  maxlength="30" id="short_title" name="short_title" type="text" placeholder="Short Title" >
                                </div>
                                <div class="form-group col-4">
                                    <label for="category_id">Category Name</label>
                                   <select name="category_id" class="form-control " id="category_id">
                                       @foreach ($db as $data)
                                       <option value="{{$data->id}}">{{$data->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="website">Website Name</label>
                                    <input class="form-control  placement"  maxlength="30" id="website" name="website" type="text" placeholder="Website Name">
                                </div>
                                <div class="form-group col-4">
                                    <label for="client">Client Name</label>
                                    <input class="form-control  placement"  maxlength="30" id="client" name="client" type="text" placeholder="Client Name">
                                </div>
                                <div class="form-group col-6">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" class="form-control  textarea" maxlength="260" id="short_description" rows="6" placeholder="Short Description"></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <label for="description1">Description One</label>
                                    <textarea name="description1" class="form-control  textarea" maxlength="900" id="description1" rows="6" placeholder="Description One..."></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <label for="description2">Description Two</label>
                                    <textarea name="description2" class="form-control  textarea" maxlength="900" id="description2" rows="6" placeholder="Description Two..."></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <label for="sub_title">Image</label>
                                    <div class="custom-file ">                                
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                        <input type="file" class="custom-file-input" name="img"  id="imgInp">
                                        <div class="text-danger ">Image must be width: <b>750px</b> and height: <b>500px</b></div>
                                    </div>
                                    <div class=" offset-2 mt-4">
                                        <img class="mb-3" src="" id="img_show" width="80"/>
                                    </div>
                                </div>                            
                                <div class="form-group col-6">
                                    <label for="sub_title"></label>
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Submit </button>
                                </div>
                            </div>
                        </form>                           
                    </div>
                </div>
            </div> 
        </div><!-- end row -->
    </div><!-- container -->
@endsection