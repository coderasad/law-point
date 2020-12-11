@extends('admin.admin_layouts')
@section('admin_content')
    <div class="container-fluid">       
        <div class="row">  
            <!-- <div class="col-md-2 mt-3">
                <a href="{{ url('logo/create') }}" class="btn btn-effect-ripple btn-primary waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Add Logo</a>
            </div> -->
            <div class="col-md-12 mb-2 mt-3">
                <h4 class="text-center radius bg-primary text-white p-2 text-uppercase">Logo & Meta</h4>
            </div>          
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> 
                        <div class="table-responsive text-center">
                            <table class="table" id="generalData">
                                <thead>
                                    <tr>
                                        <th>Meta Description</th>
                                        <th>Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($db as $data)
                                        <tr>
                                            <td>{{$data->seo_des}}</td>  
                                            <td><img width="200px" src="public/frontend/images/logo/{{ $data->logo }}" alt=""></td>                                      
                                            <td style="white-space: nowrap; width: 15%;">
                                                <div class="text-center">
                                                    <div class="btn-group-sm"> 
                                                        <a data-toggle="tooltip" data-original-title="Edit" href="{{url('logo/'.$data->id.'/edit')}}" class="btn btn-sm btn-warning text-center"><span class="ti-pencil text-light"></span></a>
                                                    </div>                       
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach  

                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- container -->
    
@endsection