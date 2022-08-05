@extends('master_page.dashboard')

@section('dashboard_bar')
    About Client Item
@endsection
@section('dashboard_short_title')
    Welcome to Client Item
@endsection

@section('main_content')
    <div class="container">
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
                        <form action="{{ route('about_client.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client Photo</label>
                                        <input type="file" name="client_photo" class="@error('client_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        @error('client_photo')
                                          <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="team_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 200x120</small><br>
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
                $('#team_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#team_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
