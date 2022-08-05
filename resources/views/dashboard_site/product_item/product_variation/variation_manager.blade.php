@extends('master_page.dashboard')

@section('dashboard_bar')
    Product Variation
@endsection
@section('dashboard_short_title')
    Welcome to Product Variation
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            {{-- color variation code here --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Color Add</h2>
                    </div>
                    {{-- color create code here --}}
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{ route('color.variation')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Color Name:</label>
                                        <input type="text" name="color_name" class="@error('color_name') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('color_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Color Code:</label>
                                        <input type="color" name="color_code" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                    {{-- color list code here --}}
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h2>Color List</h2>
                        </div>
                        <div class="text-right mr-3 mt-3">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color: rgb(245, 234, 234);"></i><br>Recycle Bin</button>

                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title" id="myLargeModalLabel">Deleted modal</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table id="color_deleted_modal_table" class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Color Name</th>
                                                        <th>Color Code</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($deleted_color_info as $deleted_color )
                                                        <tr>
                                                            <td>{{$deleted_color->color_name}}</td>
                                                            <td>
                                                                <span class="badge" style="background: {{$deleted_color->color_code}}"> &nbsp; </span>
                                                            </td>
                                                            <td>
                                                                <div class="mb-2 ">
                                                                    <a href="{{route('restore_color',$deleted_color->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a><br>
                                                                    <a href="{{route('color.forceDelete',$deleted_color->id)}}" type="button" class="btn btn-danger btn-square btn-xs mt-2">Permanent Delete</a>
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
                            @if(session('delete_message'))
                                <div class="alert alert-danger">
                                    {{session('delete_message')}}
                                </div>
                            @endif
                            <table id="color_table_list" class="table table-bordered table-responsive" style="border: none;">
                                <thead>
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($color_variation_data as $color )
                                        <tr>
                                                <td>{{$color->color_name}}</td>
                                                <td>
                                                    <span class="badge" style="background: {{$color->color_code}}"> &nbsp; </span>
                                                </td>
                                                <td>
                                                    <a href="{{route('color.delete',$color->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                       @empty
                                            <tr class="text-center text-danger">
                                                <td colspan="50">No data no show</td>
                                            </tr>
                                       @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- size variation code here --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Size Add</h2>
                    </div>
                    {{-- size create code  here --}}
                    <div class="card-body">
                        @if(session('success_message_2'))
                            <div class="alert alert-success">
                                {{session('success_message_2')}}
                            </div>
                        @endif
                        <form action="{{ route('size.variation')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Size Name:</label>
                                        <input type="text" name="size_name" class="@error('size_name') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('size_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                    {{-- size list code  here --}}
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h2>Size List</h2>
                        </div>
                        <div class="text-right mr-3 mt-3">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm1"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color: rgb(245, 234, 234);"></i><br>Recycle Bin</button>

                            <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title" id="myLargeModalLabel">Deleted modal</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table id="size_deleted_modal_table" class="table table-bordered table-responsive" style="border: none;">
                                                <thead>
                                                    <tr>
                                                        <th>Size Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($deleted_size_info as $deleted_size )
                                                        <tr>
                                                            <td>{{$deleted_size->size_name}}</td>
                                                            <td>
                                                                <div class="mb-2">
                                                                    <a href="{{route('restore_size',$deleted_size->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a><br>
                                                                    <a href="{{route('size.forceDelete',$deleted_size->id)}}" type="button" class="btn btn-danger btn-square btn-xs mt-2">Permanent Delete</a>
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
                            @if(session('size_delete'))
                                <div class="alert alert-danger">
                                    {{session('size_delete')}}
                                </div>
                            @endif
                            <table id="size_table_list" class="table table-bordered table-responsive" style="border:none;">
                                <thead>
                                    <tr>
                                        <th>Size Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($size_variation_data as $size )
                                        <tr>
                                                <td>{{$size->size_name}}</td>
                                                <td>
                                                    <a href="{{route('size.delete',$size->id)}}" class="text-danger"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                       @empty
                                            <tr class="text-center text-danger">
                                                <td colspan="50">No data no show</td>
                                            </tr>
                                       @endforelse
                                    </tbody>
                            </table>
                        </div>
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
            $('#size_deleted_modal_table').DataTable();
        });
        $(document).ready(function(){
            $('#size_table_list').DataTable();
        });

        $(document).ready(function(){
            $('#color_deleted_modal_table').DataTable();
        });
        $(document).ready(function(){
            $('#color_table_list').DataTable();
        });
        // DataTable plugin code end here

    </script>
@endsection

