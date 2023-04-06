@extends('master_page.frontend')

@section('content')
    <div class="page-heading products-heading  header-text" style="background-image: url({{asset('uploads-photos/our-product-banner-photo')}}/{{$our_product_banner_info->banner_photo}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="text-content">
                    <h4>{{$our_product_banner_info->short_title}}</h4>
                    <h2>{{$our_product_banner_info->long_title}}</h2>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filters">
                            <ul>
                                <li class="active" data-filter="*">All Products</li>
                                @forelse ($category_product_data as $category_product )
                                    <li data-filter=".{{$category_product->id}}">{{$category_product->category_name}}</li>
                                @empty
                                    <td colspan="50" class="text-center">
                                        <span class="text-danger">No data available to show</span>
                                    </td>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="filters-content d-block">
                            <div class="row grid" style="height: 450vh;">
                            @forelse ($product_item_all_data as $product_item )
                                <div class="col-lg-4 col-md-4 all {{$product_item->category_id}}">
                                    {{-- product_main_area code start here  --}}
                                    @include('dashboard_site.product_item.product_main_area.product_parts')
                                    {{-- product_main_area code end here  --}}
                                </div>
                            @empty
                                <td colspan="50" class="text-center">
                                    <span class="text-danger">No data available to show</span>
                                </td>
                            @endforelse
                            </div>
                        </div>
                    </div>
                    {{-- pagination --}}
                    <div class="col-md-12">
                        <div class="paginate d-flex" style="margin: 2% 0 0 40%">
                            <ul class="pagination">
                                <li>{{ $product_item_all_data->links() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
