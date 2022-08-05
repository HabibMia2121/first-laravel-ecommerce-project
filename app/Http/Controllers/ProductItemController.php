<?php

namespace App\Http\Controllers;

use App\Models\Category_product;
use App\Models\Color_variation;
use App\Models\Countrie;
use App\Models\Order_summary;
use App\Models\Product_feature_photo;
use App\Models\Product_inventory;
use App\Models\product_item;
use App\Models\Shopping;
use App\Models\Size_variation;
use App\Models\Subcategory_product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Core\Color;
use Image;

class ProductItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    public function index()
    {
        $product_all_info=product_item::latest()->get();
        $deleted_product_data=product_item::onlyTrashed()->latest()->get();
        return view('dashboard_site.product_item.index',compact('product_all_info','deleted_product_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_info=Category_product::latest()->get();
        return view('dashboard_site.product_item.create',compact('category_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
            'product_thumbnail_photo'=>'required|Image',
        ]);
        // photo upload code start here
            // step:1->new photo name create
            $new_name=Str::random(7).'.'.$request->file('product_thumbnail_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('uploads-photos/product-photo/').$new_name;
            Image::make($request->file('product_thumbnail_photo'))->resize(400,252)->save($save_link);
        // photo upload code endt here

        $slug = Str::slug($request->product_name);
        product_item::insert([
            'product_thumbnail_photo'=>$new_name,
            'product_name'=>$request->product_name,
            'current_price'=>$request->current_price,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'short_description'=>$request->short_description,
            'slug'=>$slug,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_item  $product_item
     * @return \Illuminate\Http\Response
     */
    public function show(product_item $product_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_item  $product_item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_info=Product_item::where('id',$id)->first();
        $category_info=Category_product::latest()->get();
        return view('dashboard_site.product_item.editpage',compact('product_info','category_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_item  $product_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            '*'=>'required',
        ]);
        if($request->product_thumbnail_photo == null){
            if($request->hasFile('product_thumbnail_photo')){
                //client_photo delete from file
                    unlink(public_path('uploads-photos/product-photo/').$request->old_product_thumbnail_photo);

                // photo upload code start here
                    // step:1->new photo name create
                    $new_name=Str::random(7).'.'.$request->file('product_thumbnail_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('uploads-photos/product-photo/').$new_name;
                    Image::make($request->file('product_thumbnail_photo'))->resize(400,252)->save($save_link);
                // photo upload code endt here
            };
            if($request->hasFile('product_thumbnail_photo') != Null){
                product_item::find($id)->update([
                    'product_thumbnail_photo'=>$new_name,
                    'product_name'=>$request->product_name,
                    'current_price'=>$request->current_price,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'short_description'=>$request->short_description,
                ]);
            }
            else{
                product_item::find($id)->update([
                    'product_name'=>$request->product_name,
                    'current_price'=>$request->current_price,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'short_description'=>$request->short_description,
                ]);
            }
            return back()->with('update_message','Update successfully!');
        }
        else{
            $status=true;
            if(!in_array($request->product_thumbnail_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status=false;
            }
            if($status){
                if($request->hasFile('product_thumbnail_photo')){
                    //client_photo delete from file
                        unlink(public_path('uploads-photos/product-photo/').$request->old_product_thumbnail_photo);

                    // photo upload code start here
                        // step:1->new photo name create
                        $new_name=Str::random(7).'.'.$request->file('product_thumbnail_photo')->getClientOriginalExtension();
                        // step:2->new photo upload
                        $save_link=public_path('uploads-photos/product-photo/').$new_name;
                        Image::make($request->file('product_thumbnail_photo'))->resize(400,252)->save($save_link);
                    // photo upload code endt here
                };
            }
            else{
                return back()->with('file_format_error_product','there are one or many unsupported file in your attachment');
            }

            if($request->hasFile('product_thumbnail_photo') != Null){
                product_item::find($id)->update([
                    'product_thumbnail_photo'=>$new_name,
                    'product_name'=>$request->product_name,
                    'current_price'=>$request->current_price,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'short_description'=>$request->short_description,
                ]);
            }
            else{
                product_item::find($id)->update([
                    'product_name'=>$request->product_name,
                    'current_price'=>$request->current_price,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'short_description'=>$request->short_description,
                ]);
            }
            return back()->with('update_message','Update successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_item  $product_item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product_item::find($id)->delete();
        return back()->with('delete_message','Delete Complated!');
    }
    //product deleted data restore & forceDelete code start here
    public function restore_product($id)
    {
        product_item::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function product_forceDelete($id)
    {
        unlink(public_path('uploads-photos/product-photo/').product_item::onlyTrashed()->find($id)->product_thumbnail_photo);
        product_item::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //product deleted data restore & forceDelete code end here

    // get_subcategories code start here
    public function get_subcategories(Request $request)
    {
        $subcategories=Subcategory_product::where('category_id',$request->category_id)->get();
        if($subcategories->count() == 0){
            $string_to_send="<option value=''>-No subcategory at database-</option>";
        }
        else{
            $string_to_send="<option value=''>-Choose One-</option>";
        }
        foreach($subcategories as $subcategory){
            $string_to_send .="<option value='$subcategory->id'>$subcategory->subcategory_name</option>";
        }
        return $string_to_send;
    }
    // get_subcategories code end here
    //edit_get_subcategories code start here
    public function edit_for_get_subcategories(Request $request)
    {
        $subcategories=Subcategory_product::where('category_id',$request->category_id)->get();
        if($subcategories->count() == 0){
            $string_to_send="<option value=''>-No subcategory at database-</option>";
        }
        else{
            $string_to_send="<option value=''>-Choose One-</option>";
        }
        foreach($subcategories as $subcategory){
            $string_to_send .="<option value='$subcategory->id'>$subcategory->subcategory_name</option>";
        }
        return $string_to_send;
    }
    // edit_get_subcategories code end here
    /*===============================variation manager page code start here====================================*/
    public function variation_manager()
    {
        return view('dashboard_site.product_item.product_variation.variation_manager',[
            'color_variation_data'=>Color_variation::latest()->get(),
            'deleted_color_info'=>Color_variation::onlyTrashed()->latest()->get(),
            'size_variation_data'=>Size_variation::latest()->get(),
            'deleted_size_info'=>Size_variation::onlyTrashed()->latest()->get(),
        ]);
    }
    // colo variation code start here
    public function color_variation(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);
        Color_variation::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Color added successfully!');
    }
    public function color_delete($id)
    {
        Color_variation::find($id)->delete();
        return back()->with('delete_message','Delete Complated!');
    }
        //color deleted data restore & forceDelete code start here
    public function restore_color($id)
    {
        Color_variation::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function color_forceDelete($id)
    {
        Color_variation::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
        //color deleted data restore & forceDelete code end here
    // colo variation code end here

    // size variation code start here
    public function size_variation(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);
        Size_variation::insert([
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message_2','Size added successfully!');
    }
    public function size_delete($id)
    {
        Size_variation::find($id)->delete();
        return back()->with('size_delete','Delete Complated!');

    }
        //size deleted data restore & forceDelete code start here
    public function restore_size($id)
    {
        Size_variation::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function size_forceDelete($id)
    {
        Size_variation::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
        //size deleted data restore & forceDelete code end here
    // size variation code end here
    /*===============================variation manager page code end here========================================*/

    /*===============================add feature photo page code start here=====================================*/
    public function add_feature_photo($product_id)
    {
        $product_item_data=Product_item::find($product_id);
        $product_feature_photo_data=Product_feature_photo::where('product_id',$product_id)->get();
        return view('dashboard_site.product_item.add_feature_photo.index',compact('product_item_data','product_feature_photo_data'));
    }
    public function product_feature_photo_post(Request $request,$product_id)
    {
        if($request->feature_photo != null){
            $status=true;
            foreach($request->file('feature_photo') as $single_feature_photo){
               if(!in_array($single_feature_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status=false;
               }
            }
            if($status){
                foreach($request->file('feature_photo') as $single_feature_photo){
                    //photo upload code start here
                        //step:1-> photo name create
                    $new_photo_name=Str::random(7)."." .$single_feature_photo->getClientOriginalExtension();
                        // step:2->new photo upload
                    $save_photo_link=public_path('uploads-photos/product-feature-photo/').$new_photo_name;
                    Image::make($single_feature_photo)->resize(400, 252)->save($save_photo_link);
                    // photo upload code end here
                    Product_feature_photo::insert([
                        'product_id'=>$product_id,
                        'feature_photo'=>$new_photo_name,
                        'created_at'=>Carbon::now(),
                    ]);
                }
                return back()->with('success_message','product feature photo added successfully!');
            }
            else{
                return back()->with('file_format_error_message','there are one or many unsupported file in your attachment');
            }
        }
        else{
            return back()->withErrors(['Please give photo then try!']);
        }


    }
    public function product_feature_photo_delete($product_id)
    {
        unlink(public_path('uploads-photos/product-feature-photo/').Product_feature_photo::find($product_id)->feature_photo);
        Product_feature_photo::find($product_id)->delete();
        return back()->with('delete_message','Product feature photo delete Completed!');
    }
    /*===============================add feature photo page code end here=======================================*/

    /*===============================add inventory code start here=======================================*/
    public function add_inventory($product_id)
    {
        $product_item_data=product_item::find($product_id);
        $color_all_data=Color_variation::latest()->get();
        $size_all_data=Size_variation::latest()->get();
        $inventory_all_data=Product_inventory::where('product_id',$product_id)->latest()->get();
        return view('dashboard_site.product_item.add_inventory.inventory',compact('product_item_data','color_all_data','size_all_data','inventory_all_data'));
    }
    public function add_inventory_post(Request $request,$product_id)
    {
        $request->validate([
            'quantity'=>'required',
        ]);
        Product_inventory::insert([
            'product_id'=>$product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Inventory added successfully!');
    }
    public function inventory_delete($product_id)
    {
        Product_inventory::find($product_id)->delete();
        return back()->with('delete_message','Inventory deleted complated!');
    }
    /*===============================add inventory code end here=======================================*/

    /*===============================shopping_charge code start here=======================================*/
    public function shopping_charge()
    {
        $countrie_info=Countrie::all();
        $shopping_info=Shopping::latest()->get();
        $deleted_data=Shopping::onlyTrashed()->latest()->get();
        return view('dashboard_site.product_item.shopping.index',compact('countrie_info','shopping_info','deleted_data'));
    }
    public function add_shopping(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'country_id.required'=>'Please select country name then try!',
            'city_name.required'=>'Please enter the city name then try!',
            'shopping_charge.required'=>'Please enter the charge amount then try!',
        ]);

        $is_exists=Shopping::where([
            'country_id'=>$request->country_id,
            'city_name'=>$request->city_name,
        ])->exists();
        if($is_exists){
            return back()->with('shoppings_error','This country city already exists');
        }
        else{
            Shopping::insert($request->except('_token'));
        }
        return back()->with('success_message','Shopping Charge Add Successfully!');
    }
    public function shopping_delete(Shopping $shopping_id)
    {
        $shopping_id->delete();
        return back()->with('delete_message','Shopping Charge Delete Complated!');
    }
        //shopping deleted data restore & forceDelete code start here
    public function restore_shopping($id)
    {
        Shopping::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function shopping_forceDelete($id)
    {
        Shopping::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
        //shopping deleted data restore & forceDelete code end here
    /*===============================shopping_charge code end here=======================================*/

    /*===============================order code start here=======================================*/
    public function order()
    {
        $order_summary_info=Order_summary::latest()->get();
        $deleted_order_summary_data=Order_summary::onlyTrashed()->latest()->get();
        return view('dashboard_site.product_item.order.index',compact('order_summary_info','deleted_order_summary_data'));
    }
    // order_status_change cod start here
    public function order_status_change(Request $request, Order_summary $order_summary_id)
    {
        $order_summary_id->order_status = $request->order_status;
        if($order_summary_id->payment_method == 'cod'){
            if($order_summary_id->order_status == 'delivered'){
                $order_summary_id->payment_status ='paid';
            }
            else{
                $order_summary_id->payment_status ='unpaid';
            }
        }
        $order_summary_id->save();
        return back();
    }
    // order_status_change cod end here

    // product_order_delete cod start here
    public function product_order_delete(Order_summary $order_summary_id)
    {
        $order_summary_id->delete();
        return back()->with('order_delete_message','Order Delete Complated!');
    }


        // Order_summary delete data restore & forceDelete code start here
    public function restore_order($id)
    {
        Order_summary::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function order_forceDelete($id)
    {
        Order_summary::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
        //Order_summary deleted data restore & forceDelete code end here
    // product_order_delete cod end here
    /*===============================order code end here=======================================*/
}
