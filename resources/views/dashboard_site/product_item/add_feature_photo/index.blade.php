@extends('master_page.dashboard')

@section('dashboard_bar')
    Products Feature Photo
@endsection
@section('dashboard_short_title')
    Welcome to Products Feature Photo
@endsection

@section('main_content')
    <div class="container">
        {{-- create code here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Products Feature Photo - {{$product_item_data->product_name}}</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        @if(session('file_format_error_message'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_message')}}
                            </div>
                        @endif
                        <form action="{{ route('product_feature_photo.post',$product_item_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Feature Photo</label>
                                        <input type="file" name="feature_photo[]" class="@error('feature_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);" multiple>
                                        @foreach ($errors->all() as $error)
                                            <span class="text-danger">{{$error}}</span><br>
                                        @endforeach
                                        <img class="hidden mt-2" id="product_feature_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 400x252</small><br>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Product Featured Photo - {{$product_item_data->product_name}}</h2>
                    </div>
                    <div class="card-body table-responsive">
                        @if(session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                       <table class="table table-borderd">
                           <thead>
                               <tr>
                                   <th>Serial No</th>
                                   <th>Product Feature Photo</th>
                                   <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @forelse ($product_feature_photo_data as $product_feature_photo )
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        <img width="100px" src="{{asset('uploads-photos/product-feature-photo/')}}/{{$product_feature_photo->feature_photo}}" alt="not found">
                                    </td>
                                    <td>
                                        <a href="{{route('product_feature_photo_delete',$product_feature_photo->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="50" class="text-center">
                                        <span class="text-danger">No data available to show</span>
                                    </td>
                                @endforelse
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script_code')
    <script>
        //product thumbnail photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#product_feature_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#product_feature_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //product thumbnail photo show code end here
    </script>
@endsection

