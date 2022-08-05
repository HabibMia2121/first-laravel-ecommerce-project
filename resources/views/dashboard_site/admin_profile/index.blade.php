@extends('master_page.dashboard')

@section('dashboard_bar')
    Admin Profile
@endsection
@section('dashboard_short_title')
    Welcome to Profile
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            {{-- About info update start here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Profile Update</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_admin_profile'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_admin_profile')}}
                            </div>
                        @endif
                        <form action="{{route('admin_profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{auth()->user()->name}}" class="@error('name') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('name')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone_number" value="{{auth()->user()->phone_number}}" class="@error('phone_number') is-invalid @enderror form-control"  style="border-color:#94a4b9;">
                                        @error('phone_number')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="textarea_content_show" value="{{auth()->user()->address}}" class="@error('address') is-invalid @enderror form-control" col='4'  style="border-color:#94a4b9;"></textarea>
                                        @error('address')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Profile Photo</label>
                                        <input type="hidden" name="old_profile_photo" value="{{auth()->user()->profile_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/profile-photo')}}/{{auth()->user()->profile_photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Profile Photo</label>
                                        <input type="file" name="profile_photo" class="@error('profile_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        @error('profile_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="profile_photo_update_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 300x300</small><br>
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
            {{-- About info update end here --}}

            {{-- password change area start here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- password_success start here --}}
                        @if (session('password_success'))
                            <div class="alert alert-success">
                                {{session('password_success')}}
                            </div>
                        @endif
                        {{-- ssuccess_message end here --}}
                        <div class="settings-form">
                            <h4 class="text-primary">Password Setting</h4>
                            <form action="{{route('change_password')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" placeholder="current password" class="form-control  @error('current_password') is-invalid @enderror @error('error_password') is-invalid @enderror">

                                            @error('current_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror

                                            @error('error_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New passwore</label>
                                            <input type="password" name="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confrm Password</label>
                                            <input type="password" name="password_confirmation" placeholder="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-square btn-sm" type="submit">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- password change area end here --}}
        </div>
    </div>
@endsection

@section('js_script_code')
    <script>
         //textarea content show code start here
         $(document).ready(function(){
            $textContent='{{auth()->user()->address}}';
            $('#textarea_content_show').val($textContent);
        });
        //textarea content show code end here

        //profile photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#profile_photo_update_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#profile_photo_update_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //profile photo show code end here
    </script>
@endsection


