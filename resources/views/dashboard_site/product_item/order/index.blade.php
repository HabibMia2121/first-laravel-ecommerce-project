@extends('master_page.dashboard')

@section('dashboard_bar')
    Order
@endsection
@section('dashboard_short_title')
    Welcome to Order
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
                                                    <th>Customer Name</th>
                                                    <th>Customer Country Name</th>
                                                    <th>Customer City Name</th>
                                                    <th>Customer Address</th>
                                                    <th>Customer Mobile Number</th>
                                                    <th>Grand Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Order Status</th>
                                                    <th>Payment Method</th>
                                                    <th>Order Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_order_summary_data as $deleted_order )
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>{{$deleted_order->customer_name}}</td>
                                                    <td>{{$deleted_order->relationTocountry->name}}</td>
                                                    <td>{{$deleted_order->customer_city_name}}</td>
                                                    <td>{{$deleted_order->customer_address}}</td>
                                                    <td>{{$deleted_order->customer_number}}</td>
                                                    <td>{{$deleted_order->grand_total}}</td>
                                                    <td>{{$deleted_order->payment_status}}</td>
                                                    <td>{{$deleted_order->order_status}}</td>
                                                    <td>{{$deleted_order->payment_method}}</td>
                                                    <td>{{$deleted_order->created_at->diffforhumans()}}</td>
                                                    <td>
                                                        <form action="{{route('order_status.change',$deleted_order->id)}}" method="POST">
                                                            @csrf
                                                            <select name="order_status" class="form-control" onchange="this.form.submit()">
                                                                <option {{($deleted_order->order_status == 'processing') ?'selected':'' }} value="processing">Processing</option>
                                                                <option {{($deleted_order->order_status == 'on the way') ?'selected':'' }} value="on the way">On the way</option>
                                                                <option {{($deleted_order->order_status == 'delivered') ?'selected':'' }} value="delivered">Delivered</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <div class="mb-2 ">
                                                            <a href="{{route('restore_order',$deleted_order->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a><br>
                                                            <a href="{{route('order.forceDelete',$deleted_order->id)}}" type="button" class="btn btn-danger btn-square btn-xs mt-2">Permanent Delete</a>
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
                        @if(session('order_delete_message'))
                            <div class="alert alert-danger">
                                {{session('order_delete_message')}}
                            </div>
                        @endif
                        <table id="order_table_list" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Customer Name</th>
                                    <th>Customer Country Name</th>
                                    <th>Customer City Name</th>
                                    <th>Customer Address</th>
                                    <th>Customer Mobile Number</th>
                                    <th>Grand Total</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Payment Method</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order_summary_info as $order_summary )
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$order_summary->customer_name}}</td>
                                        <td>{{$order_summary->relationTocountry->name}}</td>
                                        <td>{{$order_summary->customer_city_name}}</td>
                                        <td>{{$order_summary->customer_address}}</td>
                                        <td>{{$order_summary->customer_number}}</td>
                                        <td>{{$order_summary->grand_total}}</td>
                                        <td>{{$order_summary->payment_status}}</td>
                                        <td>{{$order_summary->order_status}}</td>
                                        <td>{{$order_summary->payment_method}}</td>
                                        <td>{{$order_summary->created_at->diffforhumans()}}</td>
                                        <td>
                                            <form action="{{route('order_status.change',$order_summary->id)}}" method="POST">
                                                @csrf
                                                <select name="order_status" class="form-control" onchange="this.form.submit()">
                                                    <option {{($order_summary->order_status == 'processing') ?'selected':'' }} value="processing">Processing</option>
                                                    <option {{($order_summary->order_status == 'on the way') ?'selected':'' }} value="on the way">On the way</option>
                                                    <option {{($order_summary->order_status == 'delivered') ?'selected':'' }} value="delivered">Delivered</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('product_order.delete',$order_summary->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn bg-danger text-white mt-2">Delete</button>
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
            $('#order_table_list').DataTable();
        });
        // DataTable plugin code end here

    </script>
@endsection
