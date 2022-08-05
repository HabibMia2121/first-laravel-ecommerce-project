@extends('master_page.frontend')

@section('content')
    <div class="header-text" style="padding-top:4%;">
        {{-- css code start here --}}
        <style>
            /*****************globals*************/
            body {
            font-family: 'open sans';
            overflow-x: hidden; }

            img {
            max-width: 100%; }

            .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
                -ms-flex-direction: column;
                    flex-direction: column; }
            @media screen and (max-width: 996px) {
                .preview {
                margin-bottom: 20px; } }

            .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
                -ms-flex-positive: 1;
                    flex-grow: 1; }

            .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 2px; }
            .preview-thumbnail.nav-tabs li {
                width: 18%;
                margin-right: 2.5%; }
                .preview-thumbnail.nav-tabs li img {
                max-width: 100%;
                display: block; }
                .preview-thumbnail.nav-tabs li a {
                padding: 0;
                margin: 0; }
                .preview-thumbnail.nav-tabs li:last-of-type {
                margin-right: 0; }

            .tab-content {
            overflow: hidden; }
            .tab-content img {
                width: 100%;
                -webkit-animation-name: opacity;
                        animation-name: opacity;
                -webkit-animation-duration: .3s;
                        animation-duration: .3s; }

            .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em; }

            @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex; } }

            .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
                -ms-flex-direction: column;
                    flex-direction: column; }

            .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
                -ms-flex-positive: 1;
                    flex-grow: 1; }

            .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;
            font-weight: bold; }

            .checked, .price span {
            color: #ff9f1a; }

            .product-title, .rating, .product-description, .price, .vote, .sizes {
            margin-bottom: 15px; }

            .product-title {
            margin-top: 0; }

            .size {
            margin-right: 10px; }
            .size:first-of-type {
                margin-left: 40px; }

            .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px; }
            .color:first-of-type {
                margin-left: 20px; }

            .add-to-cart, .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
                    transition: background .3s ease; }
            .add-to-cart:hover, .like:hover {
                background: #b36800;
                color: #fff; }

            .not-available {
            text-align: center;
            line-height: 2em; }
            .not-available:before {
                font-family: fontawesome;
                content: "\f00d";
                color: #fff; }

            /* .orange {
            background: #ff9f1a; }

            .green {
            background: #85ad00; }

            .blue {
            background: #0076ad; } */

            .tooltip-inner {
            padding: 1.3em; }

            @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                        transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                        transform: scale(1); } }

            @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                        transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                        transform: scale(1); } }

        </style>
        {{-- css code end here --}}

        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="{{asset('uploads-photos/product-photo')}}/{{$product_slug->product_thumbnail_photo}}" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                @foreach ($product_feature_photo_data as $product_feature_photo )
                                    <li ><a data-target="#pic-1"><img src="{{asset('uploads-photos/product-feature-photo')}}/{{$product_feature_photo->feature_photo}}" /></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{$product_slug->product_name}}</h3>
                            <div class="rating">
                                <div class="stars">
                                    @php
                                        $rating_valo= $review_all_data->average('rating');
                                    @endphp
                                    @if ($review_all_data->average('rating'))
                                        @for ($start=1; $start<=round($rating_valo); $start++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for ($start_two=round($rating_valo)+1; $start_two<=5; $start_two++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                    @endif
                                </div>
                                <span class="review-no">{{$review_all_data->count()}} reviews</span>
                            </div>
                            <p class="product-description">{{$product_slug->short_description}}</p>
                            <h4 class="price">current price: <span>{{$product_slug->current_price}}৳</span></h4>
                            <input type="hidden" id="i_color_id">
                            <input type="hidden" id="i_size_id">
                            <h5 class="colors">colors:
                                @forelse ($product_color_inventory_data as $product_color_inventory )
                                    <span id="{{$product_color_inventory->color_id}}" class="color color_plate" title="{{$product_color_inventory->relationTocolor->color_name}}" style="background: {{$product_color_inventory->relationTocolor->color_code}}"></span>
                                @empty
                                    <span class="text-danger">No color Available</span>
                                @endforelse
                            </h5>
                            <h5 class="sizes mt-2">sizes:</h5>
                                <select id="size_dropdown" class="form-control">
                                    <option value="">Please choose color first</option>
                                </select>
                            <p class="mt-2">
                                <span class="text-dark">Available Stock: </span>
                                <span id="available_stock" class="badge bg-success text-white">
                                    {{$total_product_inventory}}
                                </span>
                            </p>
                            <div class="action mt-4">
                                <input id="cart_to_amount" class="like btn btn-default col-2" type="text" name="qtybutton" value="">
                                <button id="cart_button" class="add-to-cart btn btn-default" type="button">add to cart</button>
                                @auth
                                    <input type="hidden" id="cart_status" value="yes">
                                @else
                                    <input type="hidden" id="cart_status" value="no">
                                @endauth
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
        $(document).ready(function(){
            // this js code for color use
            $('.color_plate').click(function(){
                var color_id=$(this).attr('id');
                $('#i_color_id').val(color_id);
                $('#i_size_id').val('');
                var product_id='{{$product_slug->id}}';

                // ajax start here
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('get.sizes')}}",
                    data:{color_id:color_id,product_id:product_id},

                    success:function(data){
                        $('#size_dropdown').html(data);
                    }
                });
                // ajax end here
            });

            // this js code for size use
            $('#size_dropdown').change(function(){
                var size_id =$(this).val();
                $('#i_size_id').val(size_id);
                $('#cart_to_amount').val('1');
                var color_id=$('#i_color_id').val();
                var product_id='{{$product_slug->id}}';

                // ajax start here
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('get.inventory')}}",
                    data:{color_id:color_id,size_id:size_id,product_id:product_id},

                    success:function(data){
                        $('#available_stock').html(data);
                    }
                });
                // ajax end here
            });
            // this js code for cart_button use
            $('#cart_button').click(function(){
                if($('#cart_status').val() == 'no'){
                    Swal.fire({
                        title: 'You are logged in',
                        text: "Please login first!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Go to login'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{route('customer.login')}}";
                        }
                    })
                }
                else{
                    var available_stock=parseInt($('#available_stock').html());
                    var cart_to_amount=parseInt($('#cart_to_amount').val());
                    if(cart_to_amount > available_stock){
                        Swal.fire({
                            icon: 'error',
                            title: 'Stock not available',
                            text: "You have too much ,it's not allowed!",
                        })
                    }
                    else{
                        if(isNaN(cart_to_amount)){
                            Swal.fire({
                                icon: 'error',
                                title: 'Please Choose color & size first',
                                text: "Important!",
                            })
                        }
                        else{
                            if(cart_to_amount <= 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Cart amount can not less than or equal 0',
                                    text: "Important!",
                                })
                            }
                            else{
                                var product_id='{{$product_slug->id}}';
                                var product_current_price ='{{$product_slug->current_price}}';
                                var color_id=$('#i_color_id').val();
                                var size_id=$('#i_size_id').val();
                                var cart_to_amount=$('#cart_to_amount').val();
                                var user_id="{{auth()->id()}}";

                                 // ajax start here
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    type:'POST',
                                    url:"{{route('insert.cart')}}",
                                    data:{color_id:color_id,size_id:size_id,product_id:product_id,product_current_price:product_current_price,cart_to_amount:cart_to_amount,user_id:user_id},

                                    success:function(data){
                                        $('#header_cart_num').html(data.cart_amount_status + parseInt($('#header_cart_num').html()));
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Cart Added Successfully!',
                                            text: "Important!",
                                        })
                                    }
                                });
                                // ajax end here

                            }
                        }
                    }
                }
            });

        });

    </script>
@endsection
