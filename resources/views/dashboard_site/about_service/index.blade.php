@extends('master_page.dashboard')

@section('dashboard_bar')
    About Service
@endsection
@section('dashboard_short_title')
    Welcome to About Service
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Index & List</h2>
                    </div>
                    <div class="text-right mr-3 mt-3">
                        <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color: rgb(245, 234, 234);"></i><br>Recycle Bin</button>

                        <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title" id="myLargeModalLabel">Deleted modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table id="deleted_modal_table" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Icon</th>
                                                    <th>Title</th>
                                                    <th>Short Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_service_data as $deleted_service )
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>
                                                            <i class="fa {{$deleted_service->icon}} fa-2x" aria-hidden="true"></i>
                                                        </td>
                                                        <td>{{$deleted_service->title}}</td>
                                                        <td>{{$deleted_service->short_description}}</td>
                                                        <td>
                                                            <div class="mb-2 ">
                                                                <a href="{{route('restore_about_service',$deleted_service->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('about_service.forceDelete',$deleted_service->id)}}" type="button" class="btn btn-danger btn-square btn-xs mt-2">Permanent Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                <td colspan="50" class="text-center">
                                                    <span class="text-danger">No data available in table</span>
                                                </td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                    </div>
                    <div class="card-body">
                        @if(session('erorr_message'))
                            <div class="alert alert-danger">
                                {{session('erorr_message')}}
                            </div>
                        @endif
                        <table id="team_table_list" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($about_service_info as $about_service )
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>
                                            <i class="fa {{$about_service->icon}} fa-2x" aria-hidden="true"></i>
                                        </td>
                                        <td>{{$about_service->title}}</td>
                                        <td>{{$about_service->short_description}}</td>
                                        <td>
                                            <div class="btn-group mb-2 ">
                                               <a href="{{route('about_service.edit',$about_service->id)}}" type="button" class=""><i class="fa fa-pencil text-info fa-2x ml-3" aria-hidden="true"></i></a>
                                            </div>
                                            <form action="{{route('about_service.destroy',$about_service->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn bg-white" ><i class="fa fa-trash fa-2x" aria-hidden="true" style="color: rgb(203, 26, 26);"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <td colspan="50" class="text-center">
                                    <span class="text-danger">No data available in table</span>
                                </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script_code')
    <script>
        // DataTable plugin code start here
        $(document).ready(function(){
            $('#deleted_modal_table').DataTable();
        });
        $(document).ready(function(){
            $('#team_table_list').DataTable();
        });
        // DataTable plugin code end here

    </script>
@endsection
