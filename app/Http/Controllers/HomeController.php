<?php

namespace App\Http\Controllers;

use App\Models\Category_product;
use App\Models\Favicon_update;
use App\Models\Logo_favicon;
use App\Models\Order_summary;
use App\Models\product_item;
use App\Models\Subcategory_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order_summary=Order_summary::count();
        $product_item=product_item::count();
        $subcategory=Subcategory_product::count();
        $category=Category_product::count();
        return view('dashboard_site.home',compact('order_summary','product_item','subcategory','category'));
    }
    /*===============================admin_profile code start here========================================= */
    public function admin_profile()
    {
        return view('dashboard_site.admin_profile.index');
    }
    public function admin_profile_update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone_number'=>'nullable',
            'address'=>'required',
        ],[
            'name.required'=>'Please enter the name then try!',
            'address.required'=>'Please enter the address then try!',
        ]);
        if($request->profile_photo == null){
            if($request->hasFile('profile_photo')){
                // old profile photo delete from file
                if(auth()->user()->profile_photo !='default_profile_photo.jpg'){
                    unlink(public_path('uploads-photos/profile-photo/').auth()->user()->profile_photo);
                }
                // photo upload code start here
                    // step:1->new photo name create
                    $new_name=Str::random(7).'.'.$request->file('profile_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('uploads-photos/profile-photo/').$new_name;
                    Image::make($request->file('profile_photo'))->resize(300,300)->save($save_link);
                // photo upload code endt here

                User::find(auth()->id())->update([
                    'profile_photo'=>$new_name,
                ]);
            }
             User::find(auth()->id())->update([
                'name'=>$request->name,
                'phone_number'=>$request->phone_number,
                'address'=>$request->address,
            ]);
            return back()->with('success_message','Update Successfully!');
        }
        else{
            $status_admin_photo=true;
            if(!in_array($request->profile_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status_admin_photo=false;
            }
            if($status_admin_photo){
                if($request->hasFile('profile_photo')){
                    // old profile photo delete from file
                    if(auth()->user()->profile_photo !='default_profile_photo.jpg'){
                        unlink(public_path('uploads-photos/profile-photo/').auth()->user()->profile_photo);
                    }
                    // photo upload code start here
                        // step:1->new photo name create
                        $new_name=Str::random(7).'.'.$request->file('profile_photo')->getClientOriginalExtension();
                        // step:2->new photo upload
                        $save_link=public_path('uploads-photos/profile-photo/').$new_name;
                        Image::make($request->file('profile_photo'))->resize(300,300)->save($save_link);
                    // photo upload code endt here

                    User::find(auth()->id())->update([
                        'profile_photo'=>$new_name,
                    ]);
                }
            }
            else{
                return back()->with('file_format_error_admin_profile','there are one or many unsupported file in your attachment');
            }
            User::find(auth()->id())->update([
                'name'=>$request->name,
                'phone_number'=>$request->phone_number,
                'address'=>$request->address,
            ]);
            return back()->with('success_message','Update Successfully!');
        }

    }
    public function change_password(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|alpha_num|min:8',
            'password_confirmation'=>'required'
        ]);
        if($request->current_password == $request->password){
            return back()->withErrors(['error_password'=>'Your new password can not same as current password!']);
        }
        if(Hash::check($request->current_password,auth()->user()->password)){
            User::find(auth()->id())->update([
                'password'=>bcrypt($request->password)
            ]);
            return back()->with('password_success','Password Change successfully!');
        }
        else{
            return back()->withErrors(['error_password'=>'current password is wrong!']);
        }
    }
    /*===============================admin_profile code end here========================================= */

    /*===============================logo_favicon code start here========================================= */
    public function logo_favicon()
    {
        $logo_favicon_data=Logo_favicon::first();
        $favicon_update_data=Favicon_update::first();
        return view('dashboard_site.logo_favicon.index',compact('logo_favicon_data','favicon_update_data'));
    }
    // logo update code start here
    public function logo_update(Request $request,Logo_favicon $logo_id)
    {
        $request->validate([
            'logo_photo' => 'required',
        ]);

        $status=true;
        if(!in_array($request->logo_photo->getClientOriginalExtension(),['png','jpg','webp'])){
            $status=false;
        }
        if($status){
            if($request->hasFile('logo_photo')){
                // old logo_photo photo delete from file
                if($logo_id->logo_photo !='default_logo_photo.png'){
                    unlink(public_path('uploads-photos/logo_photo/').$logo_id->logo_photo);
                }
                // photo upload code start here
                    // step:1->new photo name create
                    $new_logo=Str::random(7).'.'.$request->file('logo_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('uploads-photos/logo_photo/').$new_logo;
                    Image::make($request->file('logo_photo'))->resize(105,22)->save($save_link);
                // photo upload code endt here

                Logo_favicon::find($logo_id->id)->update([
                    'logo_photo'=>$new_logo,
                ]);
            }
            return back()->with('logo_message','Update Successfully!');
        }
        else{
            return back()->with('file_format_error_logo','there are one or many unsupported file in your attachment');
        }
    }
    // logo update code end here

    // favicon update code start here
    public function favicon_update(Request $request, Favicon_update $favicon_id)
    {
        $request->validate([
            'favicon_photo' => 'required',
        ]);

        $status=true;
        if(!in_array($request->favicon_photo->getClientOriginalExtension(),['png','jpg','webp'])){
            $status=false;
        }
        if($status){
            if($request->hasFile('favicon_photo')){
                // old favicon delete from file
                if($favicon_id->favicon_photo !='default_favicon.png'){
                    unlink(public_path('uploads-photos/favicon/').$favicon_id->favicon_photo);
                }
                // photo upload code start here
                    // step:1->new photo name create
                    $new_favicon=Str::random(7).'.'.$request->file('favicon_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('uploads-photos/favicon/').$new_favicon;
                    Image::make($request->file('favicon_photo'))->resize(16,16)->save($save_link);
                // photo upload code endt here

                Favicon_update::find($favicon_id->id)->update([
                    'favicon_photo'=>$new_favicon,
                ]);
            }

            return back()->with('favicon_message','Update Successfully!');
        }
        else{
            return back()->with('file_format_error_favicon','there are one or many unsupported file in your attachment');
        }
    }
    // favicon update code end here

    /*===============================logo_favicon code end here========================================= */
}
