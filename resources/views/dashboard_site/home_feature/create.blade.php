@extends('master_page.dashboard')

@section('dashboard_bar')
    Home Feature
@endsection
@section('dashboard_short_title')
    Welcome to Home feature
@endsection

@section('main_content')
    <div class="container">
        {{-- feature title update code here --}}
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Feature Title Update</h2>
                    </div>
                    <div class="card-body">
                        @if(session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{ route('feature.title',$home_feature_head_data->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Feature Title</label>
                                        <input type="text" name="feature_title" value="{{$home_feature_head_data->feature_title}}" class="@error('feature_title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('feature_title')
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
        {{-- create code here --}}
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
                        <form action="{{ route('home_feature.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="@error('title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Small Description</label>
                                        <textarea name="small_description" class="@error('small_description') is-invalid @enderror form-control" rows="4"  style="border-color:#94a4b9;"></textarea>
                                        @error('small_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature Photo</label>
                                        <input type="file" name="feature_photo" class="@error('feature_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        @error('feature_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="feature_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 570x350</small><br>
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
        {{-- feature short text code here --}}
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Feature Short Text Create</h2>
                    </div>
                    <div class="card-body">
                        @if(session('s_message'))
                            <div class="alert alert-success">
                                {{session('s_message')}}
                            </div>
                        @endif
                        <form action="{{ route('feature.short_text')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Feature Short Text</label>
                                        <input type="text" name="short_feature_list"  class="@error('short_feature_list') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('short_feature_list')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
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
                $('#feature_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#feature_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
