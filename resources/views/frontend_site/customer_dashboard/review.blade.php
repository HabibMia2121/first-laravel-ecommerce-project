@extends('master_page.frontend')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area review_full_area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Give Review & Rating</h2>
                    <h4>Order ID: {{$order_summary_id->id}}</h4>
                    <!-- breadcrumb-list start -->
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Review Page</li>
                        </ul>
                      </nav>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- account area start -->
    <div class="account-dashboard pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($order_details as $order_detail )
                        <div class="card mb-5">
                            <div class="card-header bg-secondary ">
                                <h2 class="text-white">Product Name : {{$order_detail->relationToproduct_item->product_name}}</h2>
                                <h3 class="text-white">Color : {{$order_detail->relationTocolor->color_name}}</h3>
                                <h4 class="text-white">Size : {{$order_detail->relationTosize->size_name}}</h4>
                                <img src="{{asset('uploads-photos/product-photo')}}/{{$order_detail->relationToproduct_item->product_thumbnail_photo}}" width="100px" alt="not found">
                            </div>
                            <div class="card-body">
                                @if (App\Models\Review::where('order_details_id',$order_detail->id)->exists())
                                    <div class="alert alert-warning">
                                        Your provided review & rating of this product
                                    </div>
                                @else
                                    <form action="{{route('add.review',$order_detail->id)}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <h4>Review</h4>
                                            <input type="text" name="review" class="form-control" placeholder="Your review here">
                                        </div>
                                        <div>
                                            <h4>Rating</h4>
                                            <input type="range" name="rating" min="1" max="5" value="1">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" class="btn btn-success" value="Give Review">
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- account area start -->
@endsection


