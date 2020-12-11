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
                <a href="{{ URL::to('topbar') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-md-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Edit Topbar Section</h4>
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
                        <form class="" action="{{URL::to('topbar/'.$db->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="fb" class="">Facebook Link</label>
                                    <input class="form-control"  id="fb" name="fb_link" type="text" value="{{$db->fb_link}}" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tw" class="">Twitter Link</label>
                                    <input class="form-control"  id="tw" name="tw_link" type="text" value="{{$db->tw_link}}" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="in" class="">Linkedin Link</label>
                                    <input class="form-control"  id="in" name="in_link" type="text" value="{{$db->in_link}}" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="phone" class="">Phone</label>
                                    <input class="form-control"  id="phone" name="phone" type="text" value="{{$db->phone}}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address" class="">Update News</label>
                                    <input class="form-control placement"  maxlength="200"  id="news" name="news" type="text" value="{{$db->news}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="footer_des" class="">Footer Description</label>
                                    <input class="form-control placement"  maxlength="190"  id="footer_des" name="footer_des" type="text" value="{{$db->footer_des}}" >
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" id="insert" class="btn btn-danger waves-effect waves-light">
                                        Update
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