<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order_detail;
use App\Models\Order_summary;
use App\Models\Product_inventory;
use App\Models\Review;
use App\Models\Shopping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class CustomerController extends Controller
{
    // customer login code start here
    function customer_login()
    {
        Session::put('login_previous_link',url()->previous());
        Session::put('login_current_link',url()->current());
        return view('frontend_site.customer_login_register_area.login_register');
    }
     // customer_register_post code start here
    public function customer_register_post(Request $request)
    {
        $request->validate([
            '*'=>'required|unique:users,email',
            'phone_number'=>'digits:11',
            'password'=>'confirmed|alpha_num|min:8',
        ]);

        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
            'role'=>'Customer',
        ]);

        // sms code start
        $url = "http://66.45.237.70/api.php";
        $number="$request->phone_number";
        $text="Hello $request->name,your account created successfully in OnTopic E-commerce ";
        $data= array(
        'username'=>"01969440721",
        'password'=>"bulksmsPassword",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
        // sms code end
        return back()->with('success_message','Customer register Successfully,now you can login!');
    }
    // customer dashboard code start here
    public function customer_dashboard()
    {
        $go_previous_link=Session::get('login_previous_link');
        Session::put('login_previous_link','');
        $go_current_link=Session::get('login_current_link');
        Session::put('login_current_link','');

        if($go_previous_link != $go_current_link){
            return redirect($go_previous_link);
        }
        $order_summary_all_data=Order_summary::where('user_id',auth()->id())->latest()->get();
        return view('frontend_site.customer_dashboard.customer_db',compact('order_summary_all_data'));
    }
    // customer dashboard code end here

    // insert_cart code start here
    public function insert_cart(Request $request)
    {
        $is_exists=Cart::where([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'user_id'=>$request->user_id,
        ])->exists();
        $cart_amount_status='';
        if($is_exists){
            Cart::where([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'user_id'=>$request->user_id,
            ])->increment('cart_to_amount',$request->cart_to_amount);
            $cart_amount_status=0;
        }
        else{
            Cart::insert([
                'product_id'=>$request->product_id,
                'product_current_price'=>$request->product_current_price,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'cart_to_amount'=>$request->cart_to_amount,
                'user_id'=>$request->user_id,
                'created_at'=>Carbon::now(),
            ]);
            $cart_amount_status=1;
        }
        return response()->json(['cart_amount_status'=>$cart_amount_status]);
    }
    // insert_cart code end here

    // cart_page code start here
    public function cart_page()
    {
        if(Auth::check() == 1){
            $shopping_all_info=Shopping::select('country_id')->groupBy('country_id')->get();
            return view('frontend_site.product_item.cart',compact('shopping_all_info'));
        }
        else{
            return redirect()->route('customer.login');
        }

    }
    // cart_page code end here

    // cart_remove code start here
    public function cart_remove(Request $request)
    {
        Cart::find($request->cart_id)->delete();
    }
    // cart_remove code end here

    // cart_plus code start here
    public function cart_plus(Request $request)
    {
        Cart::find($request->cart_id)->increment('cart_to_amount');
    }
    // cart_plus code end here

    // cart_minus code start here
    public function cart_minus(Request $request)
    {
        Cart::find($request->cart_id)->decrement('cart_to_amount');
    }
    // cart_minus code end here

    // get_cityise code start here
    public function get_cityise(Request $request)
    {
        $select_option="<option value=''>-Select One City-</option>";
        $cityies=Shopping::where('country_id',$request->country_id)->get();
        foreach($cityies as $city){
            $select_option .= "<option value='$city->shopping_charge'>$city->city_name</option>";
        }
        echo $select_option;
    }
    // get_cityise code end here

    // set_country_city code start here
    public function set_country_city(Request $request)
    {
        Session::put('s_country_id',$request->country_id);
        Session::put('s_city_name',$request->city_name);
    }
    // set_country_city code end here

    // checkout code start here
    public function checkout()
    {

        $after_explode=explode('/',url()->previous());
        if(end($after_explode) != 'cartpage'){
            abort(404);
        }
        $sub_total=0;
        foreach(Cart::where('user_id',auth()->id())->get() as $cart_info){
            $sub_total += ($cart_info->product_current_price * $cart_info->cart_to_amount);
        }
        $shopping_charge=Shopping::where([
            'country_id'=>Session::get('s_country_id'),
            'city_name'=>Session::get('s_city_name'),
        ])->first()->shopping_charge;
        $grand_total=$sub_total + $shopping_charge;

        Session::put('s_sub_total',$sub_total);
        Session::put('s_shopping_charge',$shopping_charge);
        Session::put('s_grand_total',$grand_total);
        return view('frontend_site.product_item.checkout',compact('sub_total','shopping_charge','grand_total'));
    }
    public function checkout_post(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $order_summary_id=Order_summary::insertGetId([
            'user_id'=>auth()->id(),
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_country_id'=>session('s_country_id'),
            'customer_city_name'=>session('s_city_name'),
            'customer_address'=>$request->customer_address,
            'customer_number'=>$request->customer_number,
            'customer_order_notes'=>$request->customer_order_notes,
            'payment_method'=>$request->payment_method,
            'sub_total'=>session('s_sub_total'),
            'shipping_charge'=>session('s_shopping_charge'),
            'grand_total'=>session('s_grand_total'),
            'created_at'=>Carbon::now(),
        ]);
        $cart_products=Cart::where('user_id',Auth()->id())->get();
        foreach($cart_products as $cart){
            Order_detail::insert([
                'order_summary_id'=>$order_summary_id,
                'product_id'=>$cart->product_id,
                'product_current_price'=>$cart->product_current_price,
                'color_id'=>$cart->color_id,
                'size_id'=>$cart->size_id,
                'amount'=>$cart->cart_to_amount,
                'created_at'=>Carbon::now(),
            ]);
            // decrement from Product_inventory
            Product_inventory::where([
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'size_id'=>$cart->size_id,
            ])->decrement('quantity',$cart->cart_to_amount);

            // delete from cart-product
            $cart->delete();
        }
        if($request->payment_method == 'online'){
            Session::put('s_order_summary_id',$order_summary_id);
            return redirect('pay');
        }
        else{
            if(auth()->user()->role == 'Admin'){
                return redirect()->route('home');
            }
            return redirect()->route('customer.dashboard')->with('order_message','Order Complated!');
        }

    }
    // checkout code end here

    // order_delete code start here
    public function order_delete(Order_summary $order_summary_id)
    {
        $order_summary_id->delete();
        return back();
    }
    // order_delete code end here

    // later_pay code start here
    public function later_pay($grand_total,$order_summary_id)
    {
        Session::put('s_grand_total',$grand_total);
        Session::put('s_order_summary_id',$order_summary_id);
        return redirect('pay');
    }
    // later_pay code end here

    // view_invoice code start here
    public function view_invoice(Order_summary $order_summary_id)
    {
        $order_detail_data=Order_detail::where('order_summary_id',$order_summary_id->id)->get();
        return view('frontend_site.customer_dashboard.invoice',compact('order_summary_id','order_detail_data'));
    }
    // view_invoice code end here

    // download_invoice code start here
    public function download_invoice(Order_summary $order_summary_id)
    {
        $order_detail_data=Order_detail::where('order_summary_id',$order_summary_id->id)->get();
        $pdf=Pdf::loadView('frontend_site.customer_dashboard.invoice',compact('order_summary_id','order_detail_data'));
        return $pdf->download('invoice ID -'.$order_summary_id->id.'('.Carbon::now()->format('d-m-y').')');
    }
    // download_invoice code end here

    // review code start here
    public function review(Order_summary $order_summary_id)
    {
        $order_details=Order_detail::where('order_summary_id',$order_summary_id->id)->get();
        return view('frontend_site.customer_dashboard.review',compact('order_summary_id','order_details'));
    }
    public function add_review(Request $request ,Order_detail $order_detail_id)
    {
        Review::insert([
            'order_details_id'=>$order_detail_id->id,
            'product_id'=>$order_detail_id->product_id,
            'color_id'=>$order_detail_id->color_id,
            'size_id'=>$order_detail_id->size_id,
            'user_id'=>auth()->id(),
            'review'=>$request->review,
            'rating'=>$request->rating,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
    // review code end here

}

