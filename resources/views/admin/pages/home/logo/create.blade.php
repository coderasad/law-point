@extends('admin.admin_layouts')
@section('admin_content')
    <div class="container-fluid">       
        <div class="row">
            <div class="col-2 mt-3">
                <a href="{{ URL::to('logo') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Add Logo</h4>
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
                        <form class="" action="{{URL::to('logo')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-group">
                                <label for="pic" class="col-2">Image</label>
                                <div class="custom-file col-6">                                
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    <input type="file" class="custom-file-input" name="logo"  id="imgInp">
                                    <div class="text-danger ">Image must be width: <b>200px</b> and height: <b>50px</b></div>
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