<?php

namespace App\Http\Controllers;

use App\Models\About_team;
use App\Models\Category_product;
use Illuminate\Http\Request;
use App\Models\Home_banner;
use App\Models\Home_feature;
use App\Models\Home_feature_list;
use App\Models\Home_feature_head;
use App\Models\Our_product_banner;
use App\Models\product_item;
use App\Models\About_banner;
use App\Models\About_client_item;
use App\Models\About_feature;
use App\Models\About_feature_social_icon;
use App\Models\About_service;
use App\Models\About_service_background_photo;
use App\Models\About_team_social_icon;
use App\Models\Contact_banner;
use App\Models\Contact_customer;
use App\Models\Contact_describe;
use App\Models\Contact_map_link;
use App\Models\Contact_office_detail;
use App\Models\Contact_social_icon;
use App\Models\Product_feature_photo;
use App\Models\Product_inventory;
use App\Models\Review;
use App\Models\Size_variation;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    // index controller start here
    public function index()
    {
        return view('frontend_site.index',[
            'home_banner_info'=>Home_banner::all(),
            'home_feature_info'=>Home_feature::latest()->get()->take(1),
            'home_feature_list_info'=>Home_feature_list::latest()->get(),
            'home_feature_head_data'=>Home_feature_head::first(),
            'product_item_all_data'=>product_item::latest()->get()->take(3),
        ]);
    }
    // index controller end here

    // our_products controller start here
    public function our_products()
    {
        // return product_item::all();
        return view('frontend_site.our_products',[
            'our_product_banner_info'=>Our_product_banner::first(),
            'product_item_all_data'=>product_item::latest()->paginate(6),
            'category_product_data'=>Category_product::all(),
        ]);
    }
        //product_detail page code start here//
    public function product_detail_page($slug)
    {
        $product_detail=product_item::where('slug',$slug)->first();
        return view('frontend_site.product_item.product_detail',[
            'product_slug'=>product_item::where('slug',$slug)->first(),
            'product_feature_photo_data'=>Product_feature_photo::where('product_id',$product_detail->id)->get(),
            'product_color_inventory_data'=>Product_inventory::where('product_id',$product_detail->id)->select('color_id')->groupBy('color_id')->get(),
            'total_product_inventory'=>Product_inventory::where('product_id',$product_detail->id)->sum('quantity'),
            'review_all_data'=>Review::where('product_id',$product_detail->id)->get(),
        ]);
    }
        //product_detail page code end here//
        // get size code start here
    public function get_sizes(Request $request)
    {
        $str_size ="<option value=''>-Select Size-</option>";
        $sizes=Product_inventory::where([
            'color_id'=>$request->color_id,
            'product_id'=>$request->product_id,
        ])->get();

        foreach($sizes as $size){
            $str_size .="<option value='$size->size_id'>".$size->relationTosize->size_name."</option>";
        }
        echo $str_size;
    }
        // get size code end here

        // get inventory code start here
    public function get_inventory(Request $request)
    {
        echo Product_inventory::where([
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'product_id'=>$request->product_id,
        ])->first()->quantity;
    }
        // get inventory code end here

    // our_products controller end here

    // about controller start here
    public function about_us()
    {
        return view('frontend_site.about',[
            'about_banner_info'=>About_banner::first(),
            'about_feature_info'=>About_feature::latest()->get()->take(1),
            'about_feature_social_icon_data'=>About_feature_social_icon::all(),
            'about_team_info'=>About_team::latest()->get(),
            'about_team_social_icon_data'=>About_team_social_icon::all(),
            'about_service_info'=>About_service::latest()->get()->take(3),
            'background_photo_info'=>About_service_background_photo::first(),
            'about_client_item_info'=>About_client_item::latest()->get(),
        ]);
    }
    public function about_service_detail_page($id)
    {
        return view('frontend_site.about_page.about_service_detail',[
            'about_service_info'=>About_service::where('id',$id)->get(),
        ]);
    }
    // about controller end here

    // contact controller start here
    public function contact_us()
    {
        return view('frontend_site.contact',[
            'contact_banner_data'=>Contact_banner::first(),
            'office_info'=>Contact_office_detail::first(),
            'contact_social_icon_info'=>Contact_social_icon::all(),
            'contact_describe_info'=>Contact_describe::latest()->get(),
            'contact_customer_info'=>Contact_customer::latest()->get(),
            'map_data'=>Contact_map_link::first(),
        ]);
    }
    // contact controller end here
}
