@extends('master_page.dashboard')

@section('dashboard_bar')
    About Banner
@endsection
@section('dashboard_short_title')
    Welcome to About Banner
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Update Page</h2>
                    </div>
                    <div class="card-body">
                        @if(session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_about_banner'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_about_banner')}}
                            </div>
                        @endif
                        <form action="{{ route('about_banner.update',$about_banner_info->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Title</label>
                                        <input type="text" name="short_title" value="{{$about_banner_info->short_title}}" class="@error('short_title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('short_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Long Title</label>
                                        <input type="text" name="long_title" value="{{$about_banner_info->long_title}}" class="@error('long_title') is-invalid @enderror form-control"  style="border-color:#94a4b9;">
                                        @error('long_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Banner Photo</label>
                                        <input type="hidden" name="old_banner_photo" value="{{$about_banner_info->banner_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/about-banner-photo')}}/{{$about_banner_info->banner_photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Banner Photo</label>
                                        <input type="file" name="banner_photo" class="@error('banner_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        @error('banner_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="banner_photo_update_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 1600x350</small><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script_code')
    <script>
        //banner photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#banner_photo_update_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#banner_photo_update_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
