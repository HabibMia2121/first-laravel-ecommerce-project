@extends('master_page.dashboard')

@section('dashboard_bar')
    Home Banner
@endsection
@section('dashboard_short_title')
    Welcome to Home Banner
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Edit Page</h2>
                    </div>
                    <div class="card-body">
                        @if(session('edit_message'))
                            <div class="alert alert-success">
                                {{session('edit_message')}}
                            </div>
                        @endif
                        <form action="{{ route('home_banner.update',$home_banner->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Title</label>
                                        <input type="text" name="short_title" value="{{$home_banner->short_title}}" class="@error('short_title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('short_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Long Title</label>
                                        <input type="text" name="long_title" value="{{$home_banner->long_title}}" class="@error('long_title') is-invalid @enderror form-control"  style="border-color:#94a4b9;">
                                        @error('long_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Banner Photo</label>
                                        <input type="hidden" name="old_banner_photo" value="{{$home_banner->banner_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/home-banner-photo')}}/{{$home_banner->banner_photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Banner Photo</label>
                                        <input type="file" name="banner_photo" class="@error('banner_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        <img class="hidden mt-2" id="banner_photo_edit_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 1600x800</small><br>
                                        @error('banner_photo')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Edit</button>
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
                $('#banner_photo_edit_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#banner_photo_edit_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
