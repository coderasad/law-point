@extends('admin.admin_layouts')
@section('admin_content')

    <div class="container-fluid">       
        <div class="row"> 
            <div class="col-md-2 mt-3">
                <a href="{{ URL::to('portfoliocategory') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="fas fa-reply mr-2"></i>Back</a>
            </div>
            <div class="col-md-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Edit Portfolio Category Section</h4>
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
                        <form class="" action="{{ url('portfoliocategory/'.$db->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row form-group">
                                <label for="title" class="col-2">Portfolio Category Name</label>
                                <input class="form-control col-6 placement" maxlength="30" id="title" name="name" type="text" value="{{$db->name}}" >
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