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
                <a href="{{ URL::to('mission') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Add Mission Section</h4>
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
                        <form class="" action="{{URL::to('mission')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-group">
                                <label for="title" class="col-2">Mission Title</label>
                                <input class="form-control col-6 placement"  maxlength="30" id="title" name="title" type="text" placeholder="Mission Title" >
                            </div>
                            <div class="row form-group">
                                <label for="description" class="col-2">Mission Description</label>
                                <textarea name="description" id="description" class="form-control col-6 textarea"  maxlength="460" laceholder="Description Here..." rows="6" placeholder="Mission Description..."></textarea>
                            </div>
                            <div class="row form-group">
                                <label for="Point1" class="col-2">Point1</label>
                                <input class="form-control col-6 placement"  maxlength="70" id="Point1" name="p1" placeholder="Point1">
                            </div>
                            <div class="row form-group">
                                <label for="Point2" class="col-2">Point2</label>
                                <input class="form-control col-6 placement"  maxlength="70" id="Point2" name="p2" placeholder="Point2">
                            </div>
                            <div class="row form-group">
                                <label for="Point3" class="col-2">Point3</label>
                                <input class="form-control col-6 placement"  maxlength="70" id="Point3" name="p3" placeholder="Point3">
                            </div>
                            <div class="row form-group">
                                <label for="Point4" class="col-2">Point4</label>
                                <input class="form-control col-6 placement"  maxlength="70" id="Point4" name="p4" placeholder="Point4">
                            </div>
                            <div class="row form-group">
                                <label for="Point5" class="col-2">Point5</label>
                                <input class="form-control col-6 placement"  maxlength="70" id="Point5" name="p5" placeholder="Point5">
                            </div>
                            <div class="row form-group">
                                <label for="sub_title" class="col-2">mission Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="img"  id="imgInp">
                                    <div class="text-danger ">Image must be width: <b>700px</b> and height: <b>550px</b></div>
                                </div>
                                <div class="col-4 offset-2 mt-4">
                                    <img class="mb-3" src="" id="img_show" width="80"/>
                                </div>
                            </div>                            
                            <div class="row form-group">
                                <label for="sub_title" class="col-2"></label>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Submit </button>
                            </div>
                        </form>                           
                    </div>
                </div>
            </div> 
        </div><!-- end row -->
    </div><!-- container -->
@endsection