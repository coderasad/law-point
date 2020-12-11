@extends('admin.admin_layouts')
@section('admin_content')
    <div class="container-fluid">       
        <div class="row">              
            @if ($count < 1 )
                <div class="col-md-3 mt-3">
                    <a href="{{ url('about/create') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Add About Section</a>
                </div>
                <div class="col-md-9 mb-2 mt-3">
                    <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">About Section</h4>
                </div>
            @else                            
                <div class="col-md-12 mt-3 mb-2">
                    <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">About Section</h4>
                </div>
            @endif            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">  
                        <div class="table-responsive">
                            <table class="table" id="generalData">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($count < 1 )
                                        <tr>
                                            <th colspan="4" class="text-danger text-center">No data records found</th>
                                        </tr>
                                    @else
                                    @foreach ($db as $data)
                                        <tr> 
                                            <td>{{$data->title}}</td>                               
                                            <td>{{$data->description}}</td> 
                                            <td><img width="80px" src="public/frontend/images/about/{{ $data->img }}" alt=""></td>  
                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="d-flex btn-group-sm" style="float: none;">
                                                        <a data-toggle="tooltip" data-original-title="Edit" href="{{url('about/'.$data->id.'/edit')}}" class="btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil text-light"></span></a>

                                                        <a data-toggle="modal" data-target="#deleteModal" href="{{url('about/'.$data->id.'/destroy')}}" class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="ti-trash text-light"></span></a>
                                                    </div>                       
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach    
                                    @endif  
                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- container -->
@endsection