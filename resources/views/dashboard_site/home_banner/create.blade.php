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
                        <h2>Create</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_banner_photo'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_banner_photo')}}
                            </div>
                        @endif
                        <form action="{{ route('home_banner.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Title</label>
                                        <input type="text" name="short_title" class="@error('short_title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('short_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Long Title</label>
                                        <input type="text" name="long_title" class="@error('long_title') is-invalid @enderror form-control"  style="border-color:#94a4b9;">
                                        @error('long_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Photo</label>
                                        <input type="file" name="banner_photo" class="@error('banner_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        @error('banner_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="banner_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 1600x800</small><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add</button>
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
                $('#banner_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#banner_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
