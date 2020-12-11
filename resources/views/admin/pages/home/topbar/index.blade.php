@extends('admin.admin_layouts')
@section('admin_content')
    <div class="container-fluid">       
        <div class="row">
            @if ($count < 1 )
                <div class="col-md-2 mt-3">
                    <a href="{{ url('topbar/create') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Add topbar</a>
                </div>
                <div class="col-md-10 mt-3 mb-2">
                    <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Top bar section</h4>
                </div>
            @else                            
                <div class="col-md-12 mt-3 mb-2">
                    <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Top bar section</h4>
                </div>
            @endif             
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> 
                        <div class="table-responsive text-center">
                            <table class="table" id="generalData">
                                <thead>
                                    <tr>
                                        <th>Facebook Link</th>
                                        <th>Twitter Link</th>
                                        <th>Linkedin Link</th>
                                        <th>Phone</th>
                                        <th>News</th>
                                        <th>Footer Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($count < 1 )
                                        <tr>
                                            <th colspan="7" class="text-danger">No data records found</th>
                                        </tr>
                                    @else
                                    @foreach ($db as $data)
                                        <tr>
                                            <td>{{$data->fb_link}}</td>                                  
                                            <td>{{$data->tw_link}}</td>                                  
                                            <td>{{$data->in_link}}</td>                                  
                                            <td>{{$data->phone}}</td>                                  
                                            <td>{{$data->news}}</td>                                  
                                            <td>{{$data->footer_des}}</td>                                  
                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="tabledit-toolbar btn-toolbar text-center">
                                                    <div class="d-flex btn-group-sm" style="float: none;"> 
                                                        <a data-toggle="tooltip" data-original-title="Edit" href="{{url('topbar/'.$data->id.'/edit')}}" class="btn btn-sm btn-warning" style="float: none; margin: 5px;"><span class="ti-pencil text-light"></span></a>

                                                        <a data-toggle="modal" data-target="#deleteModal" href="{{url('topbar/'.$data->id.'/destroy')}}" class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="ti-trash text-light"></span></a>
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