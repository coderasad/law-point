@extends('admin.admin_layouts')
@section('admin_content')
    <div class="container-fluid">       
        <div class="row">    
            <div class="col-md-2 mt-3">
                <a href="{{ url('portfoliocategory/create') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Add Category</a>
            </div>
            <div class="col-md-10 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Portfolio Category Section</h4>
            </div>         
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> 
                        <div class="table-responsive text-center">
                            <table class="table" id="generalData">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($count < 1 )
                                        <tr>
                                            <th colspan="3" class="text-danger">No data records found</th>
                                        </tr>
                                    @else
                                    <?php $sl = 0;?>
                                    @foreach ($db as $data)
                                        <?php $sl++;?>
                                        <tr>
                                            <td>{{ $sl }}</td>  
                                            <td>{{$data->name}}</td>                 
                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="d-flex btn-group-sm" style="float: none;">
                                                        <a data-toggle="tooltip" data-original-title="Edit" href="{{url('portfoliocategory/'.$data->id.'/edit')}}" class="btn btn-sm btn-warning" style="float: none; margin: 5px;"><span class="ti-pencil text-light"></span></a>

                                                        <a data-toggle="tooltip" data-original-title="Duplicate" href="{{url('duplicatePortCat/'.$data->id)}}" class="btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="mdi mdi-content-duplicate"></span>

                                                        <a data-toggle="modal" data-target="#deleteModal" href="{{url('portfoliocategory/'.$data->id.'/destroy')}}" class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="ti-trash text-light"></span></a>
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