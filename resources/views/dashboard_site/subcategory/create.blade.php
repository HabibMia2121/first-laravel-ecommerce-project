@extends('master_page.dashboard')

@section('dashboard_bar')
    Subcategory
@endsection
@section('dashboard_short_title')
    Welcome to Subcategory
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
                        <form action="{{ route('subcategory.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select name="category_id" type="text" class="js-example-basic-single @error('category_id') is-invalid @enderror form-control" style="border-color:#94a4b9;">
                                            @foreach ($category_all_info as $category_info )
                                                <option value="{{$category_info->id}}">{{$category_info->category_name}}</option>
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
                                        <input type="text" name="subcategory_name" class="@error('subcategory_name') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('subcategory_name')
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
        // select2 use at category_id js code start here
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        // select2 use at category_id js code end here
    </script>
@endsection
