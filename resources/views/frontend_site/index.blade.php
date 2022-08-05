@extends('master_page.frontend')

@section('content')
 <!-- Banner Starts Here -->
 <div class="banner header-text">
    <div class="owl-banner owl-carousel">
        @forelse ($home_banner_info as $home_banner )
            <div class="banner-item" style="padding: 300px 0px; background-image: url({{asset('uploads-photos/home-banner-photo')}}/{{$home_banner->banner_photo}}); background-size: cover; background-repeat: no-repeat; background-position: center center; background-blend-mode: overlay;">
                <div class="text-content">
                    <h4>{{$home_banner->short_title}}</h4>
                    <h2>{{$home_banner->long_title}}</h2>
                </div>
            </div>
        @empty
            <td colspan="50" class="text-center">
                <span class="text-danger">No data available to show</span>
            </td>
        @endforelse
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="latest-products">
    <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="{{route('our_products')}}">view all products <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            @forelse ($product_item_all_data as $product_item )
                <div class="col-md-4">
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

  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>{{$home_feature_head_data->feature_title}}</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            @foreach ($home_feature_info as $home_feature )
                <h4>{{$home_feature->title}}</h4>
                <p>{{$home_feature->small_description}}</p>
            @endforeach
            <ul class="featured-list">
                @foreach ($home_feature_list_info as $home_feature_list )
                    <li><a href="#">{{$home_feature_list->short_feature_list}}</a></li>
                @endforeach
            </ul>
            {{-- <a href="about.html" class="filled-button">Read More</a> --}}
          </div>
        </div>
        <div class="col-md-6">
            @foreach ($home_feature_info as $home_feature )
                <div class="right-image">
                    <img src="{{asset('uploads-photos/home-feature-photo')}}/{{$home_feature->feature_photo}}" alt="not found">
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
              </div>
              <div class="col-md-4">
                <a href="#" class="filled-button">Purchase Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
