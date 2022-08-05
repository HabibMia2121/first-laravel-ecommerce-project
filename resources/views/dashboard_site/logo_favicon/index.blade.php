@extends('master_page.dashboard')

@section('dashboard_bar')
    Logo Favicon
@endsection
@section('dashboard_short_title')
    Welcome to Logo Favicon
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            {{-- logo code here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Logo Favicon update</h2>
                    </div>
                    <div class="card-body">
                        @if(session('logo_message'))
                            <div class="alert alert-success">
                                {{session('logo_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_logo'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_logo')}}
                            </div>
                        @endif
                        <form action="{{route('logo.update',$logo_favicon_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Logo Photo</label>
                                        <input type="hidden" name="old_logo_photo" value="{{$logo_favicon_data->logo_photo}}" class="@error('old_logo_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;"><br>
                                        <img src="{{asset('uploads-photos/logo_photo')}}/{{$logo_favicon_data->logo_photo}}" alt="not found" style="width: 100px;height:auto;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo Photo</label>
                                        <input type="file" name="logo_photo" class="@error('logo_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL1(this);">
                                        @error('logo_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="logo_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 105x22</small><br>
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
            {{-- favicon code here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('favicon_message'))
                            <div class="alert alert-success">
                                {{session('favicon_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_favicon'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_favicon')}}
                            </div>
                        @endif
                        <form action="{{route('favicon.update',$favicon_update_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Favicon</label>
                                        <input type="hidden" name="old_favicon_photo" value="{{$favicon_update_data->favicon_photo}}" class="@error('old_favicon_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;"><br>
                                        <img src="{{asset('uploads-photos/favicon')}}/{{$favicon_update_data->favicon_photo}}" alt="not found" style="width: 100px;height:auto;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <input type="file" name="favicon_photo" class="@error('favicon_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL2(this);">
                                        @error('favicon_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="favicon_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 16x16</small><br>
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
        //logo photo show code start here
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#logo_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#logo_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //logo photo show code end here
        //favicon photo show code start here
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#favicon_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#favicon_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //favicon photo show code end here
    </script>
@endsection
