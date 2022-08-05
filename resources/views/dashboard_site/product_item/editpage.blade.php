@extends('master_page.dashboard')

@section('dashboard_bar')
    Products Item
@endsection
@section('dashboard_short_title')
    Welcome to Products Item
@endsection

@section('main_content')
    <div class="container">
        {{-- create code here --}}
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
                        @if(session('file_format_error_product'))
                            <div class="alert alert-danger">
                                {{session('file_format_error_product')}}
                            </div>
                        @endif
                        <form action="{{ route('producta_item.update',$product_info->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" value="{{$product_info->product_name}}" class="@error('product_name') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('product_name')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Price</label>
                                        <input type="text" name="current_price" value="{{$product_info->current_price}}" class="@error('current_price') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('current_price')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select name="category_id"  id="category_dropdown"  class=" @error('category_id') is-invalid @enderror form-control" style="border-color:#94a4b9; ">
                                            <option value="">-Select one category-</option>
                                            @foreach ($category_info as $category )
                                                <option {{($product_info->category_id == $category->id)?'selected':''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subcategory Name</label>
                                        <select name="subcategory_id"  id="subcategory_dropdown"  class=" @error('subcategory_id') is-invalid @enderror form-control" style="border-color:#94a4b9; ">
                                                <option {{($product_info->subcategory_id)?'selected':''}}  value="{{$product_info->subcategory_id}}">{{$product_info->relationTosubcategory_product->subcategory_name}}</option>
                                        </select>
                                        @error('subcategory_id')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" id="textarea_content_show" value="{{$product_info->short_description}}" class="@error('short_description') is-invalid @enderror form-control" style="border-color:#94a4b9;"  rows="4"></textarea>
                                        @error('short_description')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Product Thumbnail Photo</label>
                                        <input type="hidden" name="old_product_thumbnail_photo" value="{{$product_info->product_thumbnail_photo}}" class="@error('product_thumbnail_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" ><br>
                                        <img src="{{asset('uploads-photos/product-photo')}}/{{$product_info->product_thumbnail_photo}}" alt="not found" style="width: 200px;height:auto;"><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Product Thumbnail Photo</label>
                                        <input type="file" name="product_thumbnail_photo" class="@error('product_thumbnail_photo') is-invalid @enderror form-control" style="border-color:#94a4b9;" onchange="readURL(this);">
                                        @error('product_thumbnail_photo')
                                            <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="product_thumbnail_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size: 400x252</small><br>
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
        //product thumbnail photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#product_thumbnail_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#product_thumbnail_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        //product thumbnail photo show code end here

        //textarea content show code start here
        $(document).ready(function(){
            $textContent='{{$product_info->short_description}}';
            $('#textarea_content_show').val($textContent);
        });
        //textarea content show code end here

        // category dropdown code start here
        $(document).ready(function(){
            $('#category_dropdown').change(function(){
                var category_id=$(this).val();
                // ajax start here
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('edit_for_get.subcategories')}}",
                    data:{category_id:category_id},

                    success:function(data){
                        $('#subcategory_dropdown').html(data);
                    }
                });
                // ajax end here

            });
        });
        // category dropdown code end here
    </script>
@endsection

