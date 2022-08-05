@extends('master_page.frontend')

@section('content')
    <div class="container header-text full_area">
        <div class="card">
            <div class="card-header text-center header_area">
                <h4 style="text-transform:uppercase;">Dashboard</h4>
            </div>
            <div class="card-body body_area">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{session('success')}}
                    </div>
                @endif
                @if (session('order_message'))
                    <div class="alert alert-success text-center">
                        {{session('order_message')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard_tab_button dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a class="collapsed nav-link active"  data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">Dashboard</a></li>
                                <li><a class="collapsed nav-link " data-toggle="collapse" data-target="#orders" aria-expanded="false" aria-controls="orders">Orders</a></li>
                                <li>
                                    <a href="login.html" class="nav-link " onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8" >
                        <div id="accordionExample">
                            <div id="dashboard" class="collapse show" aria-labelledby="dashboard" data-parent="#accordionExample">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">Total Order</p>
                                                <h4 class="card-title">{{$order_summary_all_data->count()}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">Pending Order</p>
                                                <h4 class="card-title">-</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">Delivered</p>
                                                <h4 class="card-title">-</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="orders" class="collapse" aria-labelledby="orders" data-parent="#accordionExample">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Orders</h4>
                                        <div class="table table-bordered table-responsive mt-4">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Serial No.</th>
                                                        <th>Customer City Name</th>
                                                        <th>Grand Total</th>
                                                        <th>Payment Status</th>
                                                        <th>Order Status</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Date</th>
                                                        <th>status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order_summary_all_data as $order_summary )
                                                        <tr>
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{$order_summary->customer_city_name}}</td>
                                                            <td>{{$order_summary->grand_total}}</td>
                                                            <td>
                                                                {{$order_summary->payment_status}}
                                                                @if ($order_summary->payment_method=='online' && $order_summary->payment_status=='unpaid')
                                                                    <a href="{{url('later/pay')}}/{{$order_summary->grand_total}}/{{$order_summary->id}}" class="btn btn-success">Pay Now</a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{$order_summary->order_status}}
                                                                @if ($order_summary->order_status=='delivered' && $order_summary->payment_status=='paid')
                                                                    <a href="{{route('review',$order_summary->id)}}" class="btn btn-info btn-sm">
                                                                        Give Review
                                                                    </a>
                                                                @endif

                                                            </td>
                                                            <td>{{$order_summary->payment_method}}</td>
                                                            <td>{{$order_summary->created_at->format('M d,Y')}}</td>
                                                            <td>
                                                                <a target="_blank" href="{{route('view.invoice',$order_summary->id)}}" ><i class="fa fa-eye"></i> view invoice</a>
                                                                <br>
                                                                <a href="{{route('download.invoice',$order_summary->id)}}" class="view"><i class="fa fa-download"></i> download invoice</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{route('order.delete',$order_summary->id)}}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn bg-danger text-white mt-2">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('frontend_js_script_code')
    <script>
        // nav-link get active class use js code start here
        // $(function(){
            $('.nav-link').click(function(){
                $('.nav-link').removeClass('active');
                $(this).closest('.nav-link').addClass('active');
            });
        // });
        // nav-link get active class use js code end here

    </script>
@endsection
