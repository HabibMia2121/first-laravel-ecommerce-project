<div class="product-item">
    <a target="_blank" href="{{route('product_detail.page',$product_item->slug)}}"><img src="{{asset('uploads-photos/product-photo')}}/{{$product_item->product_thumbnail_photo}}" alt="not found"></a>
    <div class="down-content">
        <a target="_blank" href="{{route('product_detail.page',$product_item->slug)}}"><h4>{{$product_item->product_name}}</h4></a>
        <h6>{{$product_item->current_price}}৳</h6>
        <p>{{substr($product_item->short_description,0,50)}}</p>
        @php
            $review_info=App\Models\Review::where('product_id',$product_item->id)->get();
            if ($review_info->average('rating')) {
                $average_rating=$review_info->average('rating');
            }
            else {
                $average_rating=0;
            }
        @endphp
        <ul class="stars">
            @for ($start=1; $start<=round($average_rating); $start++)
                <li><i class="fa fa-star "></i></li>
            @endfor
        </ul>
        <span>Reviews ({{$review_info->count()}})</span>
    </div>
</div>
