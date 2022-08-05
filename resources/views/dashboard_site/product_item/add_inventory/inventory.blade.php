@extends('master_page.dashboard')

@section('dashboard_bar')
    Add Inventory
@endsection
@section('dashboard_short_title')
    Welcome to Add Inventory
@endsection

@section('main_content')
    <div class="container">
        {{-- create code here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2>Add Inventory - {{$product_item_data->product_name}}</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{ route('add_inventory.post',$product_item_data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Color :</label>
                                        @foreach ($color_all_data as $color )
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="color_id" id="exampleRadios{{$color->id}}" value="{{$color->id}}" checked>
                                                <label class="form-check-label" for="exampleRadios{{$color->id}}">
                                                    {{$color->color_name}} <span class="badge" style="background: {{$color->color_code}}"> &nbsp; </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Size :</label>
                                        <select name="size_id" class="form-control" style="border-color:#94a4b9;">
                                            <option value="">-Choose size-</option>
                                            @foreach ($size_all_data as $size)
                                                <option value="{{$size->id}}">{{$size->size_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Quantity :</label>
                                        <input type="number" name="quantity" class="form-control" style="border-color:#94a4b9;">
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
                                   <th>Color Name</th>
                                   <th>Size Name</th>
                                   <th>Quantity</th>
                                   <th>Market Value (৳)</th>
                                   <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_market_value=0;
                                @endphp
                                @forelse ($inventory_all_data as $inventory )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>
                                            {{$inventory->relationTocolor->color_name}}
                                            <span class="badge" style="background: {{$inventory->relationTocolor->color_code}}"> &nbsp; </span>
                                        </td>
                                        <td>{{$inventory->relationTosize->size_name}}</td>
                                        <td>{{$inventory->quantity}}</td>

                                        <td>
                                            {{$product_item_data->current_price * $inventory->quantity}}
                                        </td>
                                        @php
                                            $total_market_value +=($product_item_data->current_price * $inventory->quantity);
                                        @endphp
                                        <td>
                                            <a href="{{route('inventory.delete',$inventory->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="50" class="text-center">
                                        <span class="text-danger">No data available to show</span>
                                    </td>
                                @endforelse
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <b>Total :</b>
                                    </td>
                                    <td>{{$inventory_all_data->sum('quantity')}}</td>
                                    <td>
                                        <b>{{$total_market_value}}</b>
                                    </td>
                                </tr>
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
