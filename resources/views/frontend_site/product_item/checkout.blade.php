@extends('master_page.frontend')

@section('content')
    <div class="container custome_one header-text">
        <div class="title text-center">
            <h2>Checkout Page</h2>
            <nav class="custome_two">
                <ol class="breadcrumb custome_three">
                <li class="breadcrumb-item"><a href="{{route('our_products')}}">Our Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="mb-4">
                    <h4>Billing Details</h4>
                </div>
                <form action="{{route('checkout.post')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <span>Name</span>
                            <input type="text" name="customer_name" class="form-control" value="{{auth()->user()->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <span>Email</span>
                            <input type="email" name="customer_email" class="form-control" value="{{auth()->user()->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <span>Country Name</span>
                            <input type="text" name="customer_country_name" class="form-control" value="{{App\Models\Countrie::find(session('s_country_id'))->name}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <span>City Name</span>
                            <input type="text" name="customer_city_name" class="form-control" value="{{session('s_city_name')}}" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <span>Address</span>
                            <input type="text" name="customer_address" class="form-control"  placeholder="Enter the address..">
                        </div>
                        <div class="form-group col-md-12">
                            <span>Moblie Number</span>
                            <input type="text" name="customer_number" class="form-control" >
                        </div>
                        <div class="form-group col-md-12">
                            <h5 class="mb-2">Additation Information</h5>
                            <span >Order Notes</span>
                            <textarea name="customer_order_notes" class="form-control" cols="4"></textarea>
                        </div>
                    </div>

            </div>
            <div class="col-lg-6 mt-md-30px mt-lm-30px ">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Sub Total<span class="span_number">{{$sub_total}}</span></li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Shipping Charge (+) <span class="span_number">{{$shopping_charge}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Grand Total<span class="span_number">{{$grand_total}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <h6 class="mb-2 mt-2">
                                        Payment Method
                                    </h6>
                                    <select name="payment_method" class="form-control" >
                                        <option value="cod">Cash On Delivery (COD)</option>
                                        <option value="online">Online (Card,Bkash,Rocket,Nagad,etc)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="Place-order mt-4">
                                <style>
                                    .place_order{
                                        background-color:#fb5d5d;color:#fff;display:block;
                                        font-weight:700;letter-spacing:1px;line-height:1;
                                        padding:18px 20px;text-align:center;text-transform:uppercase;
                                        border-radius:0;z-index:9;
                                        border:#fb5d5d;
                                    }
                                </style>
                                <button class="place_order">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
