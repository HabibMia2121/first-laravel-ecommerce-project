{{-- css code start here --}}
<style>
    @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
    }

    .number-input input[type="number"] {
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
    }

    .number-input input[type=number]::-webkit-inner-spin-button,
    .number-input input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    }

    .number-input button {
        -webkit-appearance: none;
        background-color: transparent;
        border: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin: 0;
        position: relative;
    }

    .number-input button:before,
    .number-input button:after {
        display: inline-block;
        position: absolute;
        content: '';
        height: 2px;
        transform: translate(-50%, -50%);
    }

    .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(90deg);
    }

    .number-input input[type=number] {
        text-align: center;
    }

    .number-input.number-input {
        border: 1px solid #ced4da;
        width: 10rem;
        border-radius: .25rem;
    }

    .number-input.number-input button {
        width: 2.6rem;
        height: .7rem;
    }

    .number-input.number-input button.minus {
        padding-left: 10px;
    }

    .number-input.number-input button:before,
    .number-input.number-input button:after {
        width: .7rem;
        background-color: #495057;
    }

    .number-input.number-input input[type=number] {
        max-width: 4rem;
        padding: .5rem;
        border: 1px solid #ced4da;
        border-width: 0 1px;
        font-size: 1rem;
        height: 2rem;
        color: #495057;
    }

    @media not all and (min-resolution:.001dpcm) {
    @supports (-webkit-appearance: none) and (stroke-color:transparent) {

            .number-input.def-number-input.safari_only button:before,
            .number-input.def-number-input.safari_only button:after {
                margin-top: -.3rem;
            }
        }
    }

    .shopping-cart .def-number-input.number-input {
        border: none;
    }

    .shopping-cart .def-number-input.number-input input[type=number] {
        max-width: 2rem;
        border: none;
    }

    .shopping-cart .def-number-input.number-input input[type=number].black-text,
    .shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
    .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
    .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
        color: #212529 !important;
    }

    .shopping-cart .def-number-input.number-input button {
        width: 1rem;
    }

    .shopping-cart .def-number-input.number-input button:before,
    .shopping-cart .def-number-input.number-input button:after {
        width: .5rem;
    }

    .shopping-cart .def-number-input.number-input button.minus:before,
    .shopping-cart .def-number-input.number-input button.minus:after {
        background-color: #9e9e9e;
    }

    .shopping-cart .def-number-input.number-input button.plus:before,
    .shopping-cart .def-number-input.number-input button.plus:after {
        background-color: #4285f4;
    }
</style>
{{-- css code end here --}}
@extends('master_page.frontend')

@section('content')
    <div class="header-text" style="padding-top:4%;">
        <div class="card shopping-cart" style="border-radius: 15px;">
            <div class="card-body text-black">

                <div class="row">
                    <div class="col-lg-6 px-5 py-4">

                        <h3 class="mb-5 pt-4 text-center fw-bold text-uppercase">Your products</h3>
                        @php
                            $sub_total=0;
                        @endphp
                        @forelse (App\Models\Cart::where('user_id',auth()->id())->get() as $cart_single_data )
                            <div class="d-flex align-items-center mb-5 mt-4">

                                <div class="flex-shrink-0">
                                    <img src="{{asset('uploads-photos/product-photo')}}/{{$cart_single_data->relationToproduct->product_thumbnail_photo}}" style="width: 150px; margin-right:7px;" alt="not found">
                                </div>

                                <div class="flex-grow-1 ms-3" >
                                    <h5 class="text-primary">{{$cart_single_data->relationToproduct->product_name}}</h5>
                                    <h6 style="color: #9e9e9e;">Color: {{$cart_single_data->relationTocolor->color_name}} <span class="badge" style="background: {{$cart_single_data->relationTocolor->color_code}}"> &nbsp; </span></h6>
                                    <h6 style="color: #9e9e9e;">Size: {{$cart_single_data->relationTosize->size_name}}</h6>
                                    <div class="d-flex align-items-center">
                                        <p class="fw-bold mb-0 me-5 pe-3">{{$cart_single_data->relationToproduct->current_price * $cart_single_data->cart_to_amount}}</p>
                                        <div class="def-number-input number-input safari_only" style="margin-left: 10px">
                                            <button id="{{$cart_single_data->id}}" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                class="minus"></button>
                                            <input class="quantity fw-bold text-black" min="0" name="quantity" value="{{$cart_single_data->cart_to_amount}}"
                                                type="number">
                                            <button id="{{$cart_single_data->id}}" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                class="plus"></button>
                                        </div>
                                    </div>
                                </div>
                                <a id="{{$cart_single_data->id}}" class="remove_button"><i class="fa fa-times"></i></a>
                            </div>
                            @php
                                $sub_total+= ($cart_single_data->relationToproduct->current_price * $cart_single_data->cart_to_amount);
                            @endphp
                        @empty
                            <div colspan="50" class="text-center">
                                <span class="text-danger">There is nothing product to see on the cart </span>
                            </div>
                        @endforelse
                        <div class="text-center">
                            <a href="{{route('our_products')}}" class="mb-5 btn bg-success text-white">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="px-4 py-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Enter your destination to get shopping.</h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div>
                                            <span>
                                                * Country:
                                            </span>
                                            <select class="form-control js-example-placeholder-single"  id="countries_dropdown">
                                                <option>-Select One Country-</option>
                                                @foreach ($shopping_all_info as $shopping_info )
                                                    <option value="{{$shopping_info->country_id}}">{{$shopping_info->relationTocountries->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <span>
                                                * City:
                                            </span>
                                            <select class="form-control" id="city_dropdown" disabled >
                                                <option value=''>-Select Country first-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h4>Cart Total</h4>
                                </div>
                                <div class="card-body" style="background-color: #ebebeb;">
                                    <div class="grand-totall">
                                        <h5>Sub Total <span id="sub_total" style="float: right;">{{$sub_total}}</span></h5>
                                        <h5>Shopping Charge (+) <span id="shopping_charge" style="float: right;">0</span></h5><hr>

                                        <h4 class="grand-totall-title">Grand Total <span id="grand_total" style="float: right;">{{$sub_total}}</span></h4>
                                        <a href="{{route('checkout')}}" class="d-none btn bg-danger text-white mt-2" id="checkout_btn">Proceed to Checkout</a>

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

        $(document).ready(function(){
            // select2 code start here
            $(".js-example-placeholder-single").select2({
                allowClear: true
            });
            // select2 code end here

            // cart remove code start here
            $('.remove_button').click(function(){
                var cart_id=$(this).attr('id');

                // ajax start here
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('cart.remove')}}",
                    data:{cart_id:cart_id},
                    success:function(data){
                        window.location.href=window.location.href;
                    }
                });
                // ajax end here
            });
            // cart remove code end here

            // cart plus code start here
            $('.plus').click(function(){
                var cart_id=$(this).attr('id');
                // ajax start here
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('cart.plus')}}",
                    data:{cart_id:cart_id},
                    success:function(data){
                        window.location.href=window.location.href;
                    }
                });
                // ajax end here
            })
            // cart plus code end here

            // cart minus code start here
            $('.minus').click(function(){
                var cart_id=$(this).attr('id');
                // ajax start here
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('cart.minus')}}",
                    data:{cart_id:cart_id},
                    success:function(data){
                        window.location.href=window.location.href;
                    }
                });
                // ajax end here
            });
            // cart minus code end here

            // countries_dropdown code start here
            $('#countries_dropdown').change(function(){
                $('#checkout_btn').addClass('d-none');
                $('#shopping_charge').html(0);
                var country_id=$(this).val();

                // ajax start here
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('get.cityise')}}",
                    data:{country_id:country_id},
                    success:function(data){
                        $('#city_dropdown').attr('disabled',false);
                        $('#city_dropdown').html(data);
                    }
                });
                // ajax end here
            });
            // countries_dropdown code end here

            // city_dropdown code start here
            $('#city_dropdown').change(function(){
                $('#shopping_charge').html($(this).val());
                var sub_total=$('#sub_total').html();
                if(sub_total <= 0){
                    $('#checkout_btn').addClass('d-none');
                }else{
                    $('#checkout_btn').removeClass('d-none');
                }
                var shopping_charge=$(this).val();
                var grand_total=parseInt(sub_total) + parseInt(shopping_charge);
                $('#grand_total').html(grand_total);
                var country_id=$('#countries_dropdown option:selected').val();
                var city_name=$(this).children("option:selected").html();

                // ajax start here
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('set.country.city')}}",
                    data:{country_id:country_id,city_name:city_name},
                    success:function(data){
                    }
                });
                // ajax end here
            });
            // city_dropdown code end here
        });
    </script>
@endsection
