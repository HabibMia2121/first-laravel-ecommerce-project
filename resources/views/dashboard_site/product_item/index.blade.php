@extends('master_page.dashboard')

@section('dashboard_bar')
    Products Item
@endsection
@section('dashboard_short_title')
    Welcome to Products Item
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
                                        <table id="deleted_modal_table" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Product Name</th>
                                                    <th>Current Price</th>
                                                    <th>category Name</th>
                                                    <th>Subcategory Name</th>
                                                    <th>Short Description</th>
                                                    <th>Product Thumbnail Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_product_data as $deleted_product )
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$deleted_product->product_name}}</td>
                                                        <td>{{$deleted_product->current_price}}</td>
                                                        <td>{{$deleted_product->relationTocategory_product->category_name}}</td>
                                                        <td>{{$deleted_product->relationTosubcategory_product->subcategory_name}}</td>
                                                        <td>{{$deleted_product->short_description}}</td>
                                                        <td>
                                                            <img src="{{asset('uploads-photos/product-photo')}}/{{$deleted_product->product_thumbnail_photo}}" width="150px" alt="not found">
                                                        </td>
                                                        <td>
                                                            <div class="mb-2 ">
                                                                <a href="{{route('restore_product',$deleted_product->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a><br>
                                                                <a href="{{route('product.forceDelete',$deleted_product->id)}}" type="button" class="btn btn-danger btn-square btn-xs mt-2">Permanent Delete</a>
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
                        <table id="product_item_table_list" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Product Name</th>
                                    <th>Current Price</th>
                                    <th>category Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Short Description</th>
                                    <th>Product Thumbnail Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($product_all_info as $product )
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->current_price}}</td>
                                        <td>{{$product->relationTocategory_product->category_name}}</td>
                                        <td>{{$product->relationTosubcategory_product->subcategory_name}}</td>
                                        <td>{{$product->short_description}}</td>
                                        <td>
                                            <img src="{{asset('uploads-photos/product-photo')}}/{{$product->product_thumbnail_photo}}" width="150px" alt="not found">
                                        </td>
                                        <td>
                                            <div>
                                                <a href="{{route('producta_item.edit',$product->id)}}" type="button" class=" btn bg-info text-white">Edit</a>
                                            </div>
                                            <form action="{{route('producta_item.destroy',$product->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn bg-danger text-white mt-2">Delete</button>
                                            </form>
                                            <div>
                                                <a href="{{route('add.inventory',$product->id)}}" type="button" class=" btn bg-warning text-white mt-2">Add Inventory</a><br>
                                                <a href="{{route('add_feature.photo',$product->id)}}" type="button" class=" btn bg-success text-white mt-2">Add Feature photo</a><br>
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
            $('#product_item_table_list').DataTable();
        });
        // DataTable plugin code end here

    </script>
@endsection
