@extends('master_page.dashboard')

@section('dashboard_bar')
   Shopping Charge Create
@endsection
@section('dashboard_short_title')
    Welcome to Shopping Charge
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Add Shopping Charge</h2>
                    </div>
                    {{-- shopping charge create code here --}}
                    <div class="card-body">
                        @if(session('shoppings_error'))
                            <div class="alert alert-danger">
                                {{session('shoppings_error')}}
                            </div>
                        @endif
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{ route('add.shopping')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Country Name</label>
                                <select name="country_id" class=" @error('country_id') is-invalid @enderror js-example-placeholder-single js-states form-control">
                                    <option value="">Select a Country name</option>
                                    @forelse ($countrie_info as $country )
                                        <option value="{{$country->id}}">{{$country->name}} {{$country->code}}</option>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="50" class="text-danger">No data to show</td>
                                        </tr>
                                    @endforelse
                                </select>
                                @error('country_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>City Name</label>
                                <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                @error('city_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Shopping Charge</label>
                                <input type="number" name="shopping_charge" class="form-control @error('shopping_charge') is-invalid @enderror" style="border-color: rgba(38, 41, 83, 0.5);">
                                @error('shopping_charge')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- shopping list code here --}}
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h2>Shopping Charge List</h2>
                    </div>
                    <div class="text-right mr-3 mt-3">
                        <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color: rgb(245, 234, 234);"></i><br>Recycle Bin</button>

                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title" id="myLargeModalLabel">Deleted modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table id="shopping_deleted_modal_table" class="table table-bordered table-responsive" >
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Country Name</th>
                                                    <th>City Name</th>
                                                    <th>Shopping Charge</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_data as $deleted_info)
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$deleted_info->relationTocountries->name}} {{$deleted_info->relationTocountries->code }}</td>
                                                        <td>{{$deleted_info->city_name}}</td>
                                                        <td>{{$deleted_info->shopping_charge}}</td>
                                                        <td>
                                                            <div class="mb-2 ">
                                                                <a href="{{route('restore_shopping',$deleted_info->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a><br>
                                                                <a href="{{route('shopping.forceDelete',$deleted_info->id)}}" type="button" class="btn btn-danger btn-square btn-xs mt-2">Permanent Delete</a>
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
                        <table id="shopping_table_list" class="table table-bordered table-responsive" style="border: none;">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Country Name</th>
                                    <th>City Name</th>
                                    <th>Shopping Charge</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @forelse ($shopping_info as $shopping )
                                   <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$shopping->relationTocountries->name}} {{$shopping->relationTocountries->code }}</td>
                                        <td>{{$shopping->city_name}}</td>
                                        <td>{{$shopping->shopping_charge}}</td>
                                        <td>
                                            <form action="{{route('shopping.delete',$shopping->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn bg-white" ><i class="fa fa-trash fa-2x" aria-hidden="true" style="color: rgb(203, 26, 26);"></i></button>
                                            </form>
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
@endsection

@section('js_script_code')
    <script>
        // DataTable plugin code start here
        $(document).ready(function(){
            $('#shopping_deleted_modal_table').DataTable();
        });
        $(document).ready(function(){
            $('#shopping_table_list').DataTable();
        });
        // DataTable plugin code end here

    </script>
@endsection
