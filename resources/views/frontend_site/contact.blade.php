@extends('master_page.frontend')

@section('content')
    <div class="page-heading contact-heading header-text" style="background-image: url({{asset('uploads-photos/contact-banner-photo')}}/{{$contact_banner_data->banner_photo}});">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="text-content">
                <h4>{{$contact_banner_data->short_title}}</h4>
                <h2>{{$contact_banner_data->long_title}}</h2>
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="find-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Location on Maps</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- How to change your own map point
                    1. Go to Google Maps
                    2. Click on your location point
                    3. Click "Share" and choose "Embed map" tab
                    4. Copy only URL and paste it within the src="" field below
                    -->
                    <div id="map">
                        <iframe src="{{$map_data->embed_map_link}}" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="left-content">
                        <h4>{{$office_info->title}}</h4>
                        <p>{{$office_info->short_description}}</p>
                        <ul class="social-icons">
                            @forelse ($contact_social_icon_info as $contact_social_icon )
                                <li><a href="{{$contact_social_icon->social_icon_link}}"><i class="fa {{$contact_social_icon->social_icon}}"></i></a></li>
                            @empty
                                <td colspan="50" class="text-center">
                                    <span class="text-danger">No Icon to show</span>
                                </td>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Send us a Message</h2>
          </div>
        </div>
        <div class="col-md-8">
          <div id="contact" class="contact-form">
            <form action="{{route('customer_data.store')}}" method="POST">
                @csrf
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset  style="margin-bottom:-24px">
                        <input name="name" type="text" class="form-control" class="mt-1 mb-4" placeholder="Full Name">
                    </fieldset>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset style="margin-bottom:-24px;margin-top:10px">
                        <input name="email" type="text" class="form-control" placeholder="E-Mail Address" >
                    </fieldset>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset style="margin-bottom:-24px;margin-top:10px">
                      <input name="phone_number" type="number" class="form-control" placeholder="Phone Number">
                    </fieldset>
                    @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <fieldset style="margin-bottom:-24px;margin-top:10px">
                      <textarea name="message" rows="6" class="form-control" placeholder="Your Message" ></textarea>
                    </fieldset>
                    @error('message')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-12">
                  <fieldset style="margin-top:10px">
                    <button type="submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <ul class="accordion">
              @forelse ($contact_describe_info as $contact_describe )
                <li>
                    <a>{{$contact_describe->title}}</a>
                    <div class="content">
                        <p>{{$contact_describe->short_description}}</p>
                    </div>
                </li>
              @empty
                <td colspan="50" class="text-center">
                    <span class="text-danger">No Icon to show</span>
                </td>
              @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>

    <div class="happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Happy Customers</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-clients owl-carousel">
                        @forelse ($contact_customer_info as $contact_customer )
                            <div class="client-item">
                                <img src="{{asset('uploads-photos/contact-client-photo')}}/{{$contact_customer->customer_photo}}" alt="not found">
                            </div>
                        @empty
                            <td colspan="50" class="text-center">
                                <span class="text-danger">No data to show</span>
                            </td>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
