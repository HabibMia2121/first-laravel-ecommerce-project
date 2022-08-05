@extends('master_page.dashboard')

@section('dashboard_bar')
    About Team
@endsection
@section('dashboard_short_title')
    Welcome to About Team
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
                        <form action="{{ route('about_team.update',$about_team->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$about_team->name}}" class="@error('name') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('name')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="designation" value="{{$about_team->designation}}" class="@error('designation') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('designation')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" id="textarea_content_show" value="{{$about_team->short_description}}" class="@error('short_description') is-invalid @enderror form-control"  style="border-color:#94a4b9;" rows="4"></textarea>
                                        @error('short_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Thumbnail Photo</label>
                                        <input type="hidden" name="old_thumbnail_photo" value="{{$about_team->thumbnail_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/about-team-photo')}}/{{$about_team->thumbnail_photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Thumbnail Photo</label>
                                        <input type="file" name="thumbnail_photo" class="@error('thumbnail_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        <img class="hidden mt-2" id="photo_edit_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 370x260</small><br>
                                        @error('thumbnail_photo')
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
            $textContent='{{$about_team->short_description}}';
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
