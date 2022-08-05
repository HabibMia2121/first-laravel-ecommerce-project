@extends('master_page.dashboard')

@section('dashboard_bar')
    Contact Describe
@endsection
@section('dashboard_short_title')
    Welcome to Contact Describe
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
                        <form action="{{ route('contact_describe.update',$describe_info_id->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$describe_info_id->title}}" class="@error('title') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('title')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="short_description" id="textarea_content_show" value="{{$describe_info_id->short_description}}" class="@error('long_description') is-invalid @enderror form-control"  style="border-color:#94a4b9;" rows="4"></textarea>
                                        @error('short_description')
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
            $textContent='{{$describe_info_id->short_description}}';
            $('#textarea_content_show').val($textContent);
        });
        //textarea content show code end here
    </script>
@endsection
