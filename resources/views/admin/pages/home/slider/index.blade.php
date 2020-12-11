@extends('admin.admin_layouts')
@section('admin_content')
    <div class="container-fluid">       
        <div class="row">    
            <div class="col-md-2 mt-3">
                <a href="{{ url('slider/create') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Add Slider</a>
            </div>
            <div class="col-md-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Slider Section</h4>
            </div>         
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> 
                        <div class="table-responsive text-center">
                            <table class="table" id="generalData">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($count < 1 )
                                        <tr>
                                            <th colspan="6" class="text-danger">No data records found</th>
                                        </tr>
                                    @else
                                    <?php $sl = 0;?>
                                    @foreach ($db as $data)
                                        <?php $sl++;?>
                                        <tr>
                                            <td>{{ $sl }}</td>  
                                            <td>{{$data->title}}</td>                               
                                            <td>{{$data->description}}</td> 
                                            <td><img width="80px" src="public/frontend/images/slider/{{ $data->img }}" alt=""></td>  
                                            <td>
                                                @if ($data->status == 1)
                                                    <span id="active_text" class="badge badge-boxed  badge-info">Active</span>
                                                @else
                                                    <span id="unactive_text" class="badge badge-boxed  badge-light">Unactive</span>
                                                @endif
                                            </td>                                    
                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="d-flex btn-group-sm" style="float: none;">
                                                        @if ($data->status == 1)                                                        
                                                            <a id="unactive_slider" data-toggle="tooltip" data-original-title="Unaction" href="{{url('unactiveSlider/'.$data->id)}}" class="btn btn-sm btn-secondary" style="float: none; margin: 5px;"><span class="ti-thumb-down text-light"></span></a>
                                                        @else
                                                            <a id="active_slider" data-toggle="tooltip" data-original-title="Action" href="{{url('activeSlider/'.$data->id)}}" class="btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-thumb-up text-light"></span></a>
                                                        @endif  
                                                        <a data-toggle="tooltip" data-original-title="Edit" href="{{url('slider/'.$data->id.'/edit')}}" class="btn btn-sm btn-warning" style="float: none; margin: 5px;"><span class="ti-pencil text-light"></span></a>

                                                        <a data-toggle="tooltip" data-original-title="Duplicate" href="{{url('duplicateSlider/'.$data->id)}}" class="btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="mdi mdi-content-duplicate"></span>

                                                        <a data-toggle="modal" data-target="#deleteModal" href="{{url('slider/'.$data->id.'/destroy')}}" class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="ti-trash text-light"></span></a>
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