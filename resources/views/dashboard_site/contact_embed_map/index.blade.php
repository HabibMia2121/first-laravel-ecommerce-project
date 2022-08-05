@extends('master_page.dashboard')

@section('dashboard_bar')
    Embed Map Link
@endsection
@section('dashboard_short_title')
    Welcome to Embed Map
@endsection

@section('main_content')
    <div class="container">
        {{-- data create here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Update Embed Map Link</h2>
                    </div>
                    <div class="card-body">
                        @if(session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{route('post.embed_map_link',$map_data->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Embed Map Link</label>
                                        <input type="text" name="embed_map_link" value="{{$map_data->embed_map_link}}" class="@error('embed_map_link') is-invalid @enderror form-control" style="border-color:#94a4b9;" >
                                        @error('embed_map_link')
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
