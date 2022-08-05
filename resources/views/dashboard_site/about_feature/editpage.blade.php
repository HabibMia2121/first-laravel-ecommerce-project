@extends('master_page.dashboard')

@section('dashboard_bar')
    About Feature
@endsection
@section('dashboard_short_title')
    Welcome to About Featurn
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
                        <form action="{{ route('about_feature.update',$about_feature->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Small Title</label>
                                        <input type="text" name="small_title" value="{{$about_feature->small_title}}" class="@error('small_title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('small_title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <textarea name="long_description" id="textarea_content_show" value="{{$about_feature->long_description}}" class="@error('long_description') is-invalid @enderror form-control"  style="border-color:#94a4b9;" rows="4"></textarea>
                                        @error('long_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Photo</label>
                                        <input type="hidden" name="old_photo" value="{{$about_feature->photo}}"><br>
                                        <img  src="{{asset('uploads-photos/about-feature-photo')}}/{{$about_feature->photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Photo</label>
                                        <input type="file" name="photo" class="@error('photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        <img class="hidden mt-2" id="photo_edit_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 570x350</small><br>
                                        @error('photo')
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
            $textContent='{{$about_feature->long_description}}';
            $('#textarea_content_show').val($textContent);
        });
        //textarea content show code end here

        //banner photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#photo_edit_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#photo_edit_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
