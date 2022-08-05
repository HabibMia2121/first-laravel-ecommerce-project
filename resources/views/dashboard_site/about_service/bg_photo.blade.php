@extends('master_page.dashboard')

@section('dashboard_bar')
    About Service
@endsection
@section('dashboard_short_title')
    Welcome to About Service
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Background Photo Update</h2>
                    </div>
                    <div class="card-body">
                        @if(session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{ route('service_bg_photo.update',$background_photo_info->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Background Photo</label>
                                        <input type="hidden" name="old_background_photo" value="{{$background_photo_info->background_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/about-service-bg-photo')}}/{{$background_photo_info->background_photo}}" alt="your image" style="width: 300px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Background Photo</label>
                                        <input type="file" name="background_photo" class="@error('background_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        <img class="hidden mt-2" id="bg_photo_update_viewer" style="width: 300px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 1600x914</small><br>
                                        @error('background_photo')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
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
                $('#bg_photo_update_viewer').attr('src', e.target.result).width(300).height(195);
                };
                $('#bg_photo_update_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
