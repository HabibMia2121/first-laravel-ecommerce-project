@extends('master_page.dashboard')

@section('dashboard_bar')
    Home Feature
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
                        <form action="{{ route('home_feature.update',$home_feature->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$home_feature->title}}" class="@error('title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Small Description</label>
                                        <textarea name="small_description" id="textarea_content_show" value="{{$home_feature->small_description}}" class="@error('small_description') is-invalid @enderror form-control"  style="border-color:#94a4b9;" rows="4"></textarea>
                                        @error('small_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Feature Photo</label>
                                        <input type="hidden" name="old_feature_photo" value="{{$home_feature->feature_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/home-feature-photo')}}/{{$home_feature->feature_photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Feature Photo</label>
                                        <input type="file" name="feature_photo" class="@error('feature_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        <img class="hidden mt-2" id="feature_photo_edit_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 570x350</small><br>
                                        @error('feature_photo')
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
        //textarea content show code start here
        $(document).ready(function(){
            $textContent='{{$home_feature->small_description}}';
            $('#textarea_content_show').val($textContent);
        });
        //textarea content show code end here

        //banner photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#feature_photo_edit_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#feature_photo_edit_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
