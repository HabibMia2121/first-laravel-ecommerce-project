@extends('master_page.dashboard')

@section('dashboard_bar')
    Contact Client Item
@endsection
@section('dashboard_short_title')
    Welcome to Client Item
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
                        @if(session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{ route('contact_client.update',$contact_client_item_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Customer Photo</label>
                                        <input type="hidden" name="old_customer_photo" value="{{$contact_client_item_data->customer_photo}}"><br>
                                        <img  src="{{asset('uploads-photos/contact-client-photo')}}/{{$contact_client_item_data->customer_photo}}" alt="your image" style="width: 200px;height:auto;"/><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Customer Photo</label>
                                        <input type="file" name="customer_photo" class="@error('customer_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        <img class="hidden mt-2" id="photo_edit_viewer" style="width: 200px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 200x120</small><br>
                                        @error('customer_photo')
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
                $('#photo_edit_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#photo_edit_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //banner photo show code end here
    </script>
@endsection
