@extends('master_page.frontend')

@section('content')
<div class="page-heading about-heading header-text" style="background-image: url({{asset('uploads-photos/about-banner-photo')}}/{{$about_banner_info->banner_photo}});">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>{{$about_banner_info->short_title}}</h4>
            <h2>{{$about_banner_info->long_title}}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="best-features about-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our Background</h2>
          </div>
        </div>
        @forelse ($about_feature_info as $about_feature )
        <div class="col-md-6">
            <div class="right-image">
              <img src="{{asset('uploads-photos/about-feature-photo')}}/{{$about_feature->photo}}" alt="not found">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>{{$about_feature->small_title}}</h4>
              <p>{{$about_feature->long_description}}</p>
              <ul class="social-icons">
                  @forelse ($about_feature_social_icon_data as $about_feature_social_icon)
                    <li><a href="{{$about_feature_social_icon->social_icon_link}}"><i class="fa {{$about_feature_social_icon->social_icon}}"></i></a></li>
                  @empty
                    <td colspan="50" class="text-center">
                        <span class="text-danger">No Icon to show</span>
                    </td>
                  @endforelse
              </ul>
            </div>
          </div>
        @empty
            <td colspan="50" class="text-center">
                <span class="text-danger">No data available to show</span>
            </td>
        @endforelse
      </div>
    </div>
  </div>


  <div class="team-members">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our Team Members</h2>
          </div>
        </div>
        @forelse ($about_team_info as $about_team )
        <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="{{asset('uploads-photos/about-team-photo')}}/{{$about_team->thumbnail_photo}}" alt="not found">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                        @forelse ($about_team_social_icon_data as $about_team_social_icon )
                            <li><a href="{{$about_team_social_icon->social_icon_link}}"><i class="fa {{$about_team_social_icon->social_icon}}"></i></a></li>
                        @empty
                            <td colspan="50" class="text-center">
                                <span class="text-white">No Icon to show</span>
                            </td>
                        @endforelse
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>{{$about_team->name}}</h4>
                <span>{{$about_team->designation}}</span>
                <p>{{$about_team->short_description}}</p>
              </div>
            </div>
          </div>
        @empty
            <td colspan="50" class="text-center">
                <span class="text-danger">No data available to show</span>
            </td>
        @endforelse
      </div>
    </div>
  </div>


  <div class="services"
  style="background-image: url({{asset('uploads-photos/about-service-bg-photo')}}/{{$background_photo_info->background_photo}}); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed; padding: 100px 0px;">
    <div class="container">
      <div class="row">
          @forelse ($about_service_info as $about_service)
            <div class="col-md-4">
                <div class="service-item">
                <div class="icon">
                    <i class="fa {{$about_service->icon}}"></i>
                </div>
                <div class="down-content">
                    <h4>{{$about_service->title}}</h4>
                    <p>{{substr($about_service->short_description,0,100)}}</p>
                    <a href="{{route('about_service_detail_page',$about_service->id)}}" class="filled-button">Details</a>
                </div>
                </div>
            </div>
          @empty
            <td colspan="50" class="text-center">
                <span class="text-danger">No data available to show</span>
            </td>
          @endforelse
      </div>
    </div>
  </div>


  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Happy Partners</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel">
            @forelse ($about_client_item_info as $about_client_item )
                <div class="client-item">
                <img src="{{asset('uploads-photos/about-client-photo')}}/{{$about_client_item->client_photo}}" alt="not found">
                </div>
            @empty
                <td colspan="50" class="text-center">
                    <span class="text-danger">No data available to show</span>
                </td>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
